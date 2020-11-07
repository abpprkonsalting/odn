<?php

namespace App\Http\Requests\API;

use App\Models\NextOfKin;
use InfyOm\Generator\Request\APIRequest;

class UpdateNextOfKinAPIRequest extends APIRequest
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
        $rules = NextOfKin::$rules;
        $rules['name'] = $rules['name'].",".$this->route("next_of_kin");
        return $rules;
    }
}
