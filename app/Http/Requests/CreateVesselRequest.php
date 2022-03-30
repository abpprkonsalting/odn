<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Vessel;

class CreateVesselRequest extends FormRequest
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
            'engine' => 'numeric',
            'vessel_type_id' => 'integer|required',
            'flags_id' => 'integer|required',
            'machine_type' => 'nullable|max:255'
        ];
    }
}
