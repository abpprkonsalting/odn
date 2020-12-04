<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class PersonalMedicalInformation
 * @package App\Models
 * @version November 15, 2020, 7:44 pm UTC
 *
 * @property integer $personal_informations_id
 * @property integer $medical_informations_id
 * @property string $issue_date
 * @property string $expiry_date
 */
class PersonalMedicalInformation extends Model
{
    use SoftDeletes;

    public $table = 'personal_medical_informations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'medical_informations_id',
        'issue_date',
        'expiry_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'medical_informations_id' => 'integer',
        'issue_date' => 'datetime:Y-m-d',
        'expiry_date' => 'datetime:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'medical_informations_id' => 'required',
        'issue_date' => 'required|date|date_format:Y-m-d',
        'expiry_date' => 'required|date|date_format:Y-m-d'
    ];

    public function getIssueDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 

    public function getExpiryDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 

    public function medicalInformation()
    {
        return $this->belongsTo(MedicalInformation::class, 'medical_informations_id');
    }

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

}
