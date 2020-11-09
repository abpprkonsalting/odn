<?php

namespace App\Http\Requests\API;

use App\Models\CourseNumber;
use InfyOm\Generator\Request\APIRequest;

class UpdateCourseNumberAPIRequest extends APIRequest
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
        $rules['name'] = $rules['name'].",".$this->route("course_number");
        return $rules;
    }
}
