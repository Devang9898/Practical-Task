@extends('layouts.app')

@section('title', 'Users List')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Users List</h4>
            <div>
                <a href="{{ route('users.create') }}" class="btn btn-light fw-bold">
                    <i class="bi bi-person-plus"></i> Add User
                </a>
                <a href="{{ route('users.export.csv') }}" class="btn btn-outline-light fw-bold">
                    <i class="bi bi-file-earmark-spreadsheet"></i> Export CSV
                </a>
                <a href="{{ route('users.export.excel') }}" class="btn btn-outline-light fw-bold">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>
            </div>
        </div>
        <div class="card-body">
            
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Users Table --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle shadow-sm">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Postcode</th>
                            <th>Gender</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Roles</th>
                            <th>Hobbies</th>
                            <th>Files</th>
                            <th class="text-center" style="width: 150px;">Actions</th>
                            <th class="text-center" style="width: 120px;">Generate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="hover-effect">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->contact_number }}</td>
                            <td>{{ $user->postcode }}</td>
                            <td>{{ ucfirst($user->gender) }}</td>
                            <td>{{ $user->state->name ?? 'N/A' }}</td>
                            <td>{{ $user->city->name ?? 'N/A' }}</td>
                            <td>
                                @foreach(json_decode($user->roles, true) ?? [] as $role)
                                    <span class="badge bg-primary">{{ $role }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach(json_decode($user->hobbies, true) ?? [] as $hobby)
                                    <span class="badge bg-secondary">{{ $hobby }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($user->uploaded_files)
                                    @foreach(json_decode($user->uploaded_files, true) as $file)
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-decoration-none">{{ basename($file) }}</a><br>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm rounded-3">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-3">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.registration', $user->id) }}" class="btn btn-danger btn-sm rounded-3">
                                    <i class="bi bi-file-pdf"></i> PDF
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="14" class="text-center text-muted">No users found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript for Delete Confirmation --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteForms = document.querySelectorAll(".delete-form");
        deleteForms.forEach((form) => {
            form.addEventListener("submit", function (event) {
                event.preventDefault();
                if (confirm("Are you sure you want to delete this user?")) {
                    this.submit();
                }
            });
        });
    });
</script>

{{-- Custom CSS for Hover Effect --}}
<style>
    .hover-effect:hover {
        background-color: #f8f9fa !important;
        transition: 0.3s;
    }
</style>

@endsection
