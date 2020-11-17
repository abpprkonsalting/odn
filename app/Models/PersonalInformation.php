<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PersonalInformation
 * @package App\Models
 * @version November 11, 2020, 10:34 pm UTC
 *
 * @property string $internal_file_number
 * @property string $external_file_number
 * @property string $full_name
 * @property string $id_number
 * @property string $serial_number
 * @property string $birthday
 * @property string $birthplace
 * @property integer $province_id
 * @property integer $municipality_id
 * @property string $address
 * @property  $political_integration_id
 * @property string $principal_phone
 * @property string $secondary_phone
 * @property string $cell_phone
 * @property string $relevant_action
 * @property string $skin_color
 * @property string $sex
 * @property integer $eyes_color_id
 * @property integer $hair_color_id
 * @property number $height
 * @property decinal $weight
 * @property string $particular_sings
 * @property string $email
 * @property integer $marital_status_id
 * @property integer $school_grade_id
 * @property string $avatar
 */
class PersonalInformation extends Model
{
    use SoftDeletes;

    public $table = 'personal_informations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'internal_file_number',
        'external_file_number',
        'full_name',
        'id_number',
        'serial_number',
        'birthday',
        'birthplace',
        'province_id',
        'municipality_id',
        'address',
        'political_integration_id',
        'principal_phone',
        'secondary_phone',
        'cell_phone',
        'relevant_action',
        'skin_color',
        'sex',
        'eyes_color_id',
        'hair_color_id',
        'height',
        'weight',
        'particular_sings',
        'email',
        'marital_status_id',
        'school_grade_id',
        'avatar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'internal_file_number' => 'string',
        'external_file_number' => 'string',
        'full_name' => 'string',
        'id_number' => 'string',
        'serial_number' => 'string',
        'birthday' => 'date',
        'birthplace' => 'string',
        'province_id' => 'integer',
        'municipality_id' => 'integer',
        'address' => 'string',
        'principal_phone' => 'string',
        'secondary_phone' => 'string',
        'cell_phone' => 'string',
        'relevant_action' => 'string',
        'skin_color' => 'string',
        'sex' => 'string',
        'eyes_color_id' => 'integer',
        'hair_color_id' => 'integer',
        'height' => 'decimal:2',
        'particular_sings' => 'string',
        'email' => 'string',
        'marital_status_id' => 'integer',
        'school_grade_id' => 'integer',
        'avatar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'internal_file_number' => 'required|max:250',
        'external_file_number' => 'max:250',
        'full_name' => 'max:250',
        'id_number' => 'required|max:250|unique:personal_informations,id_number',
        'serial_number' => 'max:250',
        'birthplace' => 'max:250',
        'address' => 'nullable|max:500',
        'principal_phone' => 'nullable|max:250',
        'secondary_phone' => 'nullable:max:250',
        'cell_phone' => 'nullable|max:250',
        'relevant_action' => 'nullable',
        'skin_color' => 'nullable|max:25',
        'sex' => 'max:25',
        'hair_color_id' => 'nullable',
        'height' => 'nullable',
        'weight' => 'nullable',
        'particular_sings' => 'nullable',
        'email' => 'nullable|max:250',
        'marital_status_id' => 'nullable',
        'school_grade_id' => 'nullable',
        'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ];

    public function operationalInformation()
    {
        return $this->hasOne('App\Models\OperationalInformation', 'personal_informations_id');
    }
    
}
