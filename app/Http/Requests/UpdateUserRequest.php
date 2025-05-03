<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Str;

class UpdateUserRequest extends FormRequest
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
            'full_name' => ['sometimes', 'string', 'min:5', 'max:50'],
            'username' => [
                'sometimes',
                'alpha_dash:ascii',
                'min:3',
                'max:20',
                Rule::unique('users', 'username')->ignore($this->user()->id),
            ],
            'email' => [
                'sometimes',
                'string',
                'email:strict,dns',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user()->id),
            ],
            'gender' => ['sometimes', 'in:male,female,others,unspecified'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'avatar.max' => 'Avatar must be 2MB or smaller.',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->email) {
            $this->merge([
                'email' => Str::lower($this->email),
            ]);
        }

        if ($this->username) {
            $this->merge([
                'username' => Str::lower($this->username),
            ]);
        }
    }
}
