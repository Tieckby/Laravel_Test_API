<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullName' => [],
            'username' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'phoneNumber' => ['required', 'min:8', 'max:20'],
            'password' => [],
            'email_verified' => []
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => "Le nom d'utilisateur est obligatoire",
            'username.min' => "Min ...",
            'username.max' => "Max ...",
        ];
    }
}
