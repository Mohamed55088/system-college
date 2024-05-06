<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Teacher extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|max:50',
            'name_en' => 'required|max:50',
            'joining_Date' => 'required|date',
            'email' => 'required|email|unique:teachers,email',
            'address' => 'max:255'
        ];
    }
}