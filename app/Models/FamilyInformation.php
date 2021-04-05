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
        'family_status_id',
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
        'family_status_id' => 'integer',
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
        'birth_date' => 'date|date_format:d-m-Y',
        'family_status_id' => 'required',
        'same_address_as_marine' => 'boolean',
        'provinces_id' => 'nullable',
        'municipalities_id' => 'nullable',
        'phone_number' => 'max:50|nullable',
        'address' => 'max:500|nullable'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'same_address_as_marine' => 1,
    ];

    public function getBirthDateAttribute($value) {
        if (!empty($value)) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    } 
    return $value;
}

 /**
     * Set the memo date
     *
     * @param  string  $value
     * @return void
     */
    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
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

    public function familyStatus()
    {
        return $this->belongsTo(FamilyStatus::class, 'family_status_id');
    }
}
