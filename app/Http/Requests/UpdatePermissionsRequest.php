<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Permissions;

class UpdatePermissionsRequest extends FormRequest
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
        $input = $this->all();
        return [
            'name' => 'required|max:190|unique:roles,name,'.$input['id'],
            'guard_name' => 'required|max:190',
            'permission' => 'array'
        ];
    }
}
