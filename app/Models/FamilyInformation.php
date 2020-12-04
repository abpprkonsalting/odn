<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
        'birth_date' => 'datetime:Y-m-d',
        'family_status' => 'string',
        'same_address_as_marine' => 'bool',
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
        'full_name' => 'max:100|required',
        'next_of_kins_id' => 'required',
        'birth_date' => 'date|date_format:Y-m-d',
        'family_status' => 'max:191|nullable',
        'same_address_as_marine' => 'boolean',
        'provinces_id' => 'required',
        'municipalities_id' => 'nullable',
        'phone_number' => 'max:50|nullable',
        'address' => 'max:500|nullable'
    ];

    public function getBirthDateAttribute($value) {
        if (!empty($value)) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 
    return $value;
}

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipalities_id');
    }

    public function nextOfKind()
    {
        return $this->belongsTo(NextOfKin::class, 'next_of_kins_id');
    }
}
