<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;

class CreateCourseRequest extends FormRequest
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
                      
            'personal_informations_id' => 'required|integer',
            'course_numbers_id' => 'required|integer',
            'country_id' => 'required|integer',
            'start_date' => 'required',
            'end_date' => 'required',
            'certificate_number' => 'required'
             
             ];
    }
}
