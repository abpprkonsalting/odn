<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class LicenseEndorsement
 * @package App\Models
 * @version December 2, 2020, 3:37 pm UTC
 *
 * @property integer $number
 * @property string $issue_date
 * @property string $expiry_date
 * @property integer $personal_informations_id
 * @property integer $countries_id
 * @property integer $license_endorsement_types_id
 * @property integer $license_endorsement_names_id
 */
class LicenseEndorsement extends Model
{
    use SoftDeletes;

    public $table = 'license_endorsements';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'number',
        'issue_date',
        'expiry_date',
        'personal_informations_id',
        'countries_id',
        'license_endorsement_types_id',
        'license_endorsement_names_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'integer',
        'issue_date' => 'datetime:Y-m-d',
        'expiry_date' => 'datetime:Y-m-d',
        'personal_informations_id' => 'integer',
        'countries_id' => 'integer',
        'license_endorsement_types_id' => 'integer',
        'license_endorsement_names_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required',
        'issue_date' => 'required|date|date_format:Y-m-d',
        'expiry_date' => 'required|date|date_format:Y-m-d',
        'personal_informations_id' => 'required',
        'countries_id' => 'required',
        'license_endorsement_types_id' => 'required',
        'license_endorsement_names_id' => 'required'
    ];
    public function getIssueDateAttribute($value) {
        if (!empty($value)) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 
    return $value;
}
public function getExpiryDateAttribute($value) {
    if (!empty($value)) {
    return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
} 
return $value;
}

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id');
    }

    public function licenseEndorsementType()
    {
        return $this->belongsTo(LicenseEndorsementType::class, 'license_endorsement_types_id');
    }

    public function licenseEndorsementName()
    {
        return $this->belongsTo(LicenseEndorsementName::class, 'license_endorsement_names_id');
    }

    
}
