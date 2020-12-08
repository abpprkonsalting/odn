<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Visa
 * @package App\Models
 * @version December 3, 2020, 5:04 pm UTC
 *
 * @property integer $visa_types_id
 * @property string $issue_date
 * @property string $expiry_date
 */
class Visa extends Model
{
    use SoftDeletes;

    public $table = 'visas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'visa_types_id',
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
        'visa_types_id' => 'integer',
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
        'visa_types_id' => 'required',
        'issue_date' => 'required|date|date_format:Y-m-d',
        'expiry_date' => 'required|date|date_format:Y-m-d'
    ];

    public function getIssueDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 
    public function getExpiryDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function visaType()
    {
        return $this->belongsTo(VisaType::class, 'visa_types_id');
    }

    
}
