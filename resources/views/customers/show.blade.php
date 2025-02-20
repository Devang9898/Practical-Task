@extends('layouts.app')

@section('content')
    <h2>Customer Details</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $customer->name }}</h4>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}</p>
            <p><strong>Account Number:</strong> {{ $customer->account_number }}</p>
            <p><strong>Status:</strong> {{ ucfirst($customer->status) }}</p>
        </div>
    </div>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
