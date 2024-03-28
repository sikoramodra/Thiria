<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name'     => ['required', 'string'],
            'email'    => ['required', 'string', 'email', 'unique:user,email'],
            'password' => [
                'required', 'string', 'min:6', 'confirmed',
                Password::min(6)->numbers()->mixedCase()
            ],
        ];
    }
}
