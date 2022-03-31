<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SchoolGrade;

class UpdateSchoolGradeRequest extends FormRequest
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
        $rules = SchoolGrade::$rules;
        
        return [
            'name' => 'required|max:250|unique:school_grades,name',
            'code' => 'required|max:250|unique:school_grades,code'
        ];
    }
}
