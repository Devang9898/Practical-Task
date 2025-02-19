<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users, modify if needed
    }

    public function rules()
    {
        return [
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'contact_number'  => 'required|digits:10',
            'postcode'        => 'nullable|digits:6',
            'gender'          => 'required|in:male,female,other',
            'state_id'        => 'required|exists:states,id',
            'city_id'         => 'required|exists:cities,id',
            'roles'           => 'required|array',
            'roles.*'         => 'string|exists:roles,name',
            'hobbies'         => 'nullable|array',
            'hobbies.*'       => 'string',
            'uploaded_files'  => 'nullable|array',
            'uploaded_files.*'=> 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }
}
