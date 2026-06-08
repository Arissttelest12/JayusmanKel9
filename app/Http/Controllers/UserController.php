<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cabang;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // Enforce permission for all user management actions
        $this->middleware('permission:manage_users');
    }

    public function index()
    {
        $user = Auth::user();
        $query = User::with(['roles', 'cabang']);

        // If manajer, only show users from their branch
        if ($user->hasRole(['Manajer', 'manajer'])) {
            $query->where('id_cabang', $user->id_cabang);
        }

        $users = $query->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = Auth::user();
        
        // Owner can see all branches, Manajer only their own
        if ($user->hasRole(['Owner', 'owner'])) {
            $cabangs = Cabang::all();
            $roles = Role::all();
        } else {
            $cabangs = Cabang::where('id_cabang', $user->id_cabang)->get();
            // Manajer shouldn't be able to create another Owner.
            $roles = Role::where('name', '!=', 'owner')->get();
        }

        return view('users.create', compact('cabangs', 'roles'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $isManajer = $user->hasRole(['Manajer', 'manajer']);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
            'id_cabang' => 'nullable|exists:cabang,id_cabang',
        ];

        // If creating a role other than owner, branch is usually required
        // But let's keep it simple: required unless role is owner
        if ($request->role !== 'owner') {
            $rules['id_cabang'] = 'required|exists:cabang,id_cabang';
        }

        // Manajer cannot create Owner role
        if ($isManajer && $request->role === 'owner') {
            return back()->with('error', 'Anda tidak memiliki izin untuk membuat user Owner.')->withInput();
        }

        $validated = $request->validate($rules);

        // If Manajer, force the branch ID
        if ($isManajer) {
            $validated['id_cabang'] = $user->id_cabang;
        }

        $newUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'id_cabang' => $validated['id_cabang'] ?? null,
        ]);

        $newUser->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $authUser = Auth::user();

        // Check if Manajer is trying to edit user from another branch or edit an Owner
        if ($authUser->hasRole(['Manajer', 'manajer'])) {
            if ($user->id_cabang !== $authUser->id_cabang || $user->hasRole(['Owner', 'owner'])) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit user ini.');
            }
            $cabangs = Cabang::where('id_cabang', $authUser->id_cabang)->get();
            $roles = Role::where('name', '!=', 'owner')->get();
        } else {
            $cabangs = Cabang::all();
            $roles = Role::all();
        }

        return view('users.edit', compact('user', 'cabangs', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $authUser = Auth::user();
        $isManajer = $authUser->hasRole(['Manajer', 'manajer']);

        if ($isManajer && ($user->id_cabang !== $authUser->id_cabang || $user->hasRole(['Owner', 'owner']))) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit user ini.');
        }

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,name',
            'id_cabang' => 'nullable|exists:cabang,id_cabang',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:8|confirmed';
        }

        if ($request->role !== 'owner') {
            $rules['id_cabang'] = 'required|exists:cabang,id_cabang';
        }

        if ($isManajer && $request->role === 'owner') {
            return back()->with('error', 'Anda tidak memiliki izin untuk menetapkan role Owner.')->withInput();
        }

        $validated = $request->validate($rules);

        if ($isManajer) {
            $validated['id_cabang'] = $authUser->id_cabang;
        }

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'id_cabang' => $validated['id_cabang'] ?? null,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        // Sync roles (replaces existing)
        $user->syncRoles([$validated['role']]);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $authUser = Auth::user();

        // Prevent deleting yourself
        if ($user->id === $authUser->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if ($authUser->hasRole(['Manajer', 'manajer'])) {
            if ($user->id_cabang !== $authUser->id_cabang || $user->hasRole(['Owner', 'owner'])) {
                abort(403, 'Anda tidak memiliki akses untuk menghapus user ini.');
            }
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
