<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\OtherSkill;

class UpdateOtherSkillRequest extends FormRequest
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
            'skill_or_knowledge_id' => 'required|integer',
            'place_or_school' => 'max:50|nullable',
            'certificate' => 'max:250|nullable',
            'knowledge_date' => 'required',
            'empirical' => 'boolean'
           
        ];
    }
}
