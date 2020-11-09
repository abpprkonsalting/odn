<?php

namespace App\Http\Requests\API;

use App\Models\Status;
use InfyOm\Generator\Request\APIRequest;

class UpdateStatusAPIRequest extends APIRequest
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
        $rules = Status::$rules;
        $rules['name'] = $rules['name'].",".$this->route("status");
        return $rules;
    }
}
