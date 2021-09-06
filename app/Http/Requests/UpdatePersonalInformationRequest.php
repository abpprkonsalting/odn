<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PersonalInformation;
use Illuminate\Validation\Rule;

class UpdatePersonalInformationRequest extends FormRequest
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
        $rules['id_number'] = [
            'required',
            'max:250',
            Rule::unique('personal_informations')->ignore($this->route("personalInformation"))->whereNull('deleted_at')
        ];
        //$rules['id_number'] = $rules['id_number'].",".$this->route("personalInformation");
        return $rules;
    }
}
