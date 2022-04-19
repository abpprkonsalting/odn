<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Passport;

class CreatePassportRequest extends FormRequest
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
            'expedition_date' => 'required',
            'expiry_date' => 'required',
            'extension_date' => 'nullable',
            'expiry_extension_date' => 'nullable',
            'no_passport' => 'required|unique:passports,no_passport'
           
        ];
    }
}
