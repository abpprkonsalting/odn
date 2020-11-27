<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FamilyInformation
 * @package App\Models
 * @version November 15, 2020, 9:17 pm UTC
 *
 * @property integer $personal_informations_id
 * @property string $full_name
 * @property integer $next_of_kins_id
 * @property string $birth_date
 * @property string $family_status
 * @property integer $same_address_as_marine
 * @property integer $provinces_id
 * @property integer $municipalities_id
 * @property string $phone_number
 * @property string $address
 */
class FamilyInformation extends Model
{
    use SoftDeletes;

    public $table = 'family_informations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'full_name',
        'next_of_kins_id',
        'birth_date',
        'family_status',
        'same_address_as_marine',
        'provinces_id',
        'municipalities_id',
        'phone_number',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'full_name' => 'string',
        'next_of_kins_id' => 'integer',
        'birth_date' => 'date',
        'family_status' => 'string',
        'same_address_as_marine' => 'integer',
        'provinces_id' => 'integer',
        'municipalities_id' => 'integer',
        'phone_number' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'full_name' => 'required|max:100',
        'next_of_kins_id' => 'required',
        'birth_date' => 'nullable',
        'family_status' => 'nullable',
        'same_address_as_marine' => 'boolean',
        'provinces_id' => 'required',
        'municipalities_id' => 'nullable',
        'phone_number' => 'max:50|nullable',
        'address' => 'nullable|mas:500'
    ];

    
}
