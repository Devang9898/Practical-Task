@extends('layouts.app')

@section('content')
    <h2>Supplier Details</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $supplier->name }}</h4>
            <p><strong>Email:</strong> {{ $supplier->email }}</p>
            <p><strong>Phone:</strong> {{ $supplier->phone }}</p>
            <p><strong>Address:</strong> {{ $supplier->address }}</p>
            <p><strong>Company Name:</strong> {{ $supplier->company_name }}</p>
            <p><strong>Status:</strong> {{ ucfirst($supplier->status) }}</p>
        </div>
    </div>

    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
