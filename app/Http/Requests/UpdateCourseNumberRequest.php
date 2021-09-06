<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CourseNumber;
use Illuminate\Validation\Rule;

class UpdateCourseNumberRequest extends FormRequest
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
        $rules = CourseNumber::$rules;
        $rules['name'] = [
            'required',
            'max:500',
            Rule::unique('course_numbers')->ignore($this->route("courseNumber"))->whereNull('deleted_at')
        ];
        //$rules['name'] = $rules['name'].",".$this->route("course_number");
        return $rules;
    }
}
