<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PersonalMedicalInformation;

class UpdatePersonalMedicalInformationRequest extends FormRequest
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
            'personal_infomation_id' => 'require|integer',
            'language_id' => 'required|integer',
            'language_skill_id' => 'required|integer',
            'level_id' => 'required|integer'
        ];
    }
}
