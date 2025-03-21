<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Str;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'min:5', 'max:50'],
            'username' => ['required', 'alpha_dash:ascii', 'min:3', 'max:20', 'unique:users,username'],
            'email' => ['required', 'string', 'email:strict,dns', 'max:255', 'unique:users,email'],
            'gender' => ['required', 'in:male,female,others,unspecified'],
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'password' => ['required', Password::default(), 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'avatar.max' => 'Avatar must be 2MB or smaller.'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'email' => Str::lower($this->email),
            'username' => Str::lower($this->username)
        ]);
    }
}
