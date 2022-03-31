<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\LicenseEndorsement;

class CreateLicenseEndorsementRequest extends FormRequest
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
                      
            'number' => 'required|integer',
            'issue_date' => 'required',
            'expiry_date' => 'required',
            'personal_informations_id' => 'required|integer',
            'countries_id' => 'required|integer',
            'license_endorsement_types_id' => 'required|integer',
            'license_endorsement_names_id' => 'required|integer'
         ];
    }
}
