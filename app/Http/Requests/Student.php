<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Student extends FormRequest
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
            'email' => 'required|email|unique:teachers,email' . $this->id,
            'password' => 'required|min:8',
            'gender_id' => 'required|numeric',
            'nationalitie_id' => 'required|numeric',
            'blood_id' => 'required|numeric',
            'reliogions' => 'required|numeric',
            // 'Date_Birth' => 'required|date',
            'grade_id' => 'required|numeric',
            'Classroom_id' => 'required|numeric',
            'section_id' => 'required|numeric',
            'parent_id' => 'required|numeric',
            'academic_year' => 'required',
        ];
    }
}