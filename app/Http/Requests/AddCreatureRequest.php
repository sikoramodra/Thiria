<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddCreatureRequest extends FormRequest {
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
            'name'        => ['required', 'string', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:10', 'max:5000'],
            'statblock'   => ['nullable'],
            'user_id'     => ['required', 'exists:user,id'],
        ];
    }
}
