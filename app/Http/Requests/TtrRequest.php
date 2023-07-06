<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TtrRequest extends FormRequest
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
            "name"=>"required",
            "Grade_id"=>"required",
            "Classroom_id"=>"required",
            "section_id"=>"required",
            "semester_id"=>"required",
            "Year"=>"required",
        ];
    }
}
