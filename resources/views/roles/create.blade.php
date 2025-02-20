
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Role</h2>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Role</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
