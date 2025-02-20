@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Role Management</h2>
    
    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Create New Role Button --}}
    <div class="mb-3">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Create New Role</a>
    </div>

    {{-- Role Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Assigned Users</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @forelse ($role->users as $user)
                            <span class="badge bg-success">
                                {{ $user->first_name }} {{ $user->last_name }}
                                <form action="{{ route('roles.detach', $role->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </span>
                        @empty
                            <span class="text-muted">No users assigned</span>
                        @endforelse
                    </td>
                    <td>
                        {{-- Edit Role --}}
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        {{-- Delete Role --}}
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Attach User to Role --}}
    <h3>Assign Role to User</h3>
    <form action="{{ route('roles.attach', $role->id ?? '') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="role_id" class="form-label">Select Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                <option value="">Choose Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="user_id" class="form-label">Select User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <option value="">Choose User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Assign Role</button>
    </form>
</div>
@endsection
