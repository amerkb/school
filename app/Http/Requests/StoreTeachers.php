<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'Email' => 'required|unique:teachers,Email,' . $this->id,
            'Password' => 'required',
            // 'Name_ar' => 'required',
            'Name_en' => 'required',
            'type_id' => 'required',
            'Gender_id' => 'required',
            'Joining_Date' => 'required|date|date_format:Y-m-d',
            'Address' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'Email.required' => ('required'),
            'Email.unique' => ('unique'),
            'Password.required' => ('required'),
            'Name_ar.required' => ('required'),
            'Name_en.required' => ('required'),
            'Specialization_id.required' => ('required'),
            'Gender_id.required' => ('required'),
            'Joining_Date.required' => ('required'),
            'Address.required' => ('required'),
        ];
    }
}
