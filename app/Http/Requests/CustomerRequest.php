<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        // Allow access if authorized, otherwise use Gate or custom logic
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $this->customer,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'account_number' => 'required|string|max:50|unique:customers,account_number,' . $this->customer,
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Customer name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already taken.',
            'phone.required' => 'Phone number is required.',
            'address.required' => 'Address is required.',
            'account_number.required' => 'Account number is required.',
            'account_number.unique' => 'This account number is already registered.',
            'status.required' => 'Status is required.',
            'status.in' => 'Invalid status value.',
        ];
    }
}
