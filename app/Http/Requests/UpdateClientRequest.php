<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            //
            'email' => 'required|email',
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'primary_legal_counsel' => 'required|string|min:2',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'date_of_profiling' => 'required|date_format:Y-m-d',
            'case_details' => 'required',

        ];
    }
}
