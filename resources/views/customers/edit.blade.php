@extends('layouts.app')

@section('content')
    <h2>Edit Customer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $customer->address) }}" required>
        </div>

        <div class="form-group">
            <label for="account_number">Account Number:</label>
            <input type="text" name="account_number" class="form-control" value="{{ old('account_number', $customer->account_number) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Customer</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
