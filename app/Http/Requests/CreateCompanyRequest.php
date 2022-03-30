<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Company;

class CreateCompanyRequest extends FormRequest
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
                      
            'company_name' => 'required|max:500|unique:companies,company_name',
            'code' => 'nullable|max:255',
            'description' => 'nullable|max:1000',
            'phone' => 'nullable|max:255',
            'fax' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'contact' => 'nullable|max:255',
            'flags_id' => 'nullable|integer',
            'company_mission_id' => 'nullable|integer',
            'company_type_id' => 'nullable|integer',
              ];
    }
}
