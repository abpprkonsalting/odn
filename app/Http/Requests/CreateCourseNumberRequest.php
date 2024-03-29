<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CourseNumber;

class CreateCourseNumberRequest extends FormRequest
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
                      
           'name' => 'required|unique:course_numbers,name|max:250',
           'code' => 'required|unique:course_numbers,code|max:10'
             
             ];
    }
}
