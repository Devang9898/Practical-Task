<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $this->supplier,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }
}

