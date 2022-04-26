<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Vessel;

class UpdateVesselRequest extends FormRequest
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
        return[
            'name' => 'required|max:250',
            'company_id' => 'required|integer',
            'gross_tank' => 'numeric',
            'omi_number' => 'numeric',
            'dwt' => 'numeric',
            'engine_power' => 'numeric',
            'vessel_type_id' => 'integer|required',
            'flags_id' => 'integer',
            'engine_type' => 'nullable|max:255'
        ];
    }
    
}
