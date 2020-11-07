<?php

namespace App\Http\Requests\API;

use App\Models\EyesColor;
use InfyOm\Generator\Request\APIRequest;

class UpdateEyesColorAPIRequest extends APIRequest
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
        $rules = EyesColor::$rules;
        $rules['name'] = $rules['name'].",".$this->route("eyes_color");
        return $rules;
    }
}
