@extends('layouts.app')

@section('title', 'User Management')
@section('header-title', 'User Management')

@section('content')
<div class="bg-white p-4 rounded shadow">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Daftar User</h2>
        <x-button variant="primary">Tambah User</x-button>
    </div>
    <x-table :headers="['ID', 'Nama', 'Email', 'Role', 'Aksi']">
        @foreach ($users as $user)
            <tr>
                <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">
                    @if($user->roles->isEmpty())
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            No Role
                        </span>
                    @else
                        @foreach($user->roles as $role)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 mr-1">
                                {{ ucfirst($role->name) }}
                            </span>
                        @endforeach
                    @endif
                </td>
                <td class="py-2 px-4 border-b">
                    <x-button variant="primary-text">Edit</x-button>
                    <x-button variant="danger-text" class="ml-2">Hapus</x-button>
                </td>
            </tr>
        @endforeach
    </x-table>
</div>
@endsection