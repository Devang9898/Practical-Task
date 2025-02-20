{{-- resources/views/roles/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Role</h2>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Role</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
