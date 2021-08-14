<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'min:3', 'max:80'],
            'last_name' => ['required', 'min:3', 'max:80'],
            'id_type'  => ['required', 'max:30'],
            'id_number' => ['required', 'min:6', 'max:80'],
            'genre' => ['required', 'in:["Female", "Male", "Other"]'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'career_id' => ['required', 'integer', 'exists:careers,id'],
            'email_address' => ['sometimes', 'required', 'email'],
            'phone_number' => ['sometimes', 'required']
        ];
    }
}
