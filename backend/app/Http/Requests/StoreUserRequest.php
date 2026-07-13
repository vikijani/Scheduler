<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',

            'birthday' => 'required|date|before:today',

            'email' => 'nullable|email|unique:users,email|required_without:phone',

            'phone' => 'nullable|digits:11|unique:users,phone|required_without:email',
        ];
    }
}
