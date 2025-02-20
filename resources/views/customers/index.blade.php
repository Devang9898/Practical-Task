@extends('layouts.app')

@section('content')
    <h2>Customers List</h2>

    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Add New Customer</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Account Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->account_number }}</td>
                    <td>{{ ucfirst($customer->status) }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
