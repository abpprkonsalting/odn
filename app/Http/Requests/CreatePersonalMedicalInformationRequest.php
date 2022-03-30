<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PersonalMedicalInformation;

class CreatePersonalMedicalInformationRequest extends FormRequest
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
            'medical_informations_id' => 'required|integer',
            'issue_date' => 'required',
            'expiry_date' => 'required'
        ];
    }
}
