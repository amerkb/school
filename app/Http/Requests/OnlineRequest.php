<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineRequest extends FormRequest
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
            "meeting_id"=>"required",
            "Grade_id"=>"required",
            "Classroom_id"=>"required",
            "section_id"=>"required",
            "topic"=>"required",
            "start_time"=>"required",
            "duration"=>"required",
            "start_url"=>"required",
            "join_url"=>"required",
            "password"=>"required",
            "semester"=>"required",
            "Year"=>"required",

        ];
    }
}
