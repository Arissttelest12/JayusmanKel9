<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if (! $user) {
            abort(403);
        }

        // Allow admin, Owner, or users who can manage users
        if (! (
            $user->hasRole('admin') ||
            $user->hasRole('Owner') ||
            $user->hasRole('owner') ||
            $user->can('manage_users')
        )) {
            abort(403);
        }

        $logs = AuditTrail::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        return view('audit_trails.index', compact('logs'));
    }
}
