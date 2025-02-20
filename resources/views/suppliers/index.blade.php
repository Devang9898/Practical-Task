@extends('layouts.apps')

@section('title', 'Suppliers')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Suppliers List</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Add Supplier</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr id="supplier-{{ $supplier->id }}">
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->company_name }}</td>
                    <td>{{ $supplier->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <button class="btn btn-primary editSupplierBtn" 
                                data-id="{{ $supplier->id }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editSupplierModal">
                            Edit
                        </button>
                        <button class="btn btn-danger deleteSupplierBtn" 
                                data-id="{{ $supplier->id }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteSupplierModal">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Include Modals -->
    @include('suppliers.create')
    @include('suppliers.edit')
    @include('suppliers.delete')
@endsection
