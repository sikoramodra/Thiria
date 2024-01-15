<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePublicationRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {return true;}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        $users = User::all()->pluck('id')->toArray();

        return [
            'title'     => ['required', 'string', 'min:3', 'max:50'],
            'content'   => ['required', 'string', 'min:10', 'max:500'],
            'author_id' => ['required', 'numeric', Rule::in($users)]
        ];
    }

    public function messages() {
        return [
            'author_id'  => 'Could not find the Author',
            '*.numeric'  => 'Input must be a number',
            '*.string'   => 'Input must be a string',
            '*.required' => '*required'
        ];
    }
}
