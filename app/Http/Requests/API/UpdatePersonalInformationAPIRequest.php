<?php

namespace App\Http\Requests\API;

use App\Models\PersonalInformation;
use InfyOm\Generator\Request\APIRequest;

class UpdatePersonalInformationAPIRequest extends APIRequest
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
        $rules = PersonalInformation::$rules;
        $rules['internal_file_number'] = $rules['internal_file_number'].",".$this->route("personal_information");$rules['external_file_number'] = $rules['external_file_number'].",".$this->route("personal_information");$rules['id_number'] = $rules['id_number'].",".$this->route("personal_information");
        return $rules;
    }
}