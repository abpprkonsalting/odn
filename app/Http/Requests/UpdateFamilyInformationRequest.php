<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\FamilyInformation;

class UpdateFamilyInformationRequest extends FormRequest
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
            'full_name' => 'max:100|required',
            'next_of_kins_id' => 'required|integer',
            'birth_date' => 'required',
            'family_status_id' => 'required|integer',
            'same_address_as_marine' => 'boolean',
            'provinces_id' => 'nullable',
            'municipalities_id' => 'nullable',
            'phone_number' => 'max:50|nullable',
            'address' => 'max:500|nullable'
             ];
    }
}
