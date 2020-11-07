<?php

namespace App\Http\Requests\API;

use App\Models\MedicalInformation;
use InfyOm\Generator\Request\APIRequest;

class UpdateMedicalInformationAPIRequest extends APIRequest
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
        $rules = MedicalInformation::$rules;
        $rules['name'] = $rules['name'].",".$this->route("medical_information");
        return $rules;
    }
}
