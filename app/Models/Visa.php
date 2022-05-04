<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use App\Models\Passport;
use App\Models\Country;

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
        'passports_id',
        'visa_types_id',
        'issue_date',
        'expiry_date',
        'countries_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'passports_id' => 'integer',
        'visa_types_id' => 'integer',
        'issue_date' => 'datetime:Y-m-d',
        'expiry_date' => 'datetime:Y-m-d',
        'countries_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'passports_id' => 'required',
        'visa_types_id' => 'required',
        'issue_date' => 'required|date|date_format:d-m-Y',
        'expiry_date' => 'required|date|date_format:d-m-Y',
        'countries_id' => 'required'
    ];

    public function getIssueDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }

     /**
     * Set the memo date
     *
     * @param  string  $value
     * @return void
     */
    public function setIssueDateAttribute($value)
    {
        $this->attributes['issue_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function getExpiryDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
     /**
     * Set the memo date
     *
     * @param  string  $value
     * @return void
     */
    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiry_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function passport()
    {
        return $this->belongsTo(Passport::class, 'passports_id');
    }

    public function personalInformation()
    {
        $passport = $this->passport();
        if (!empty($passport)) {
            return $passport->personalInformation();
        }
        return false;
    }

    public function visaType()
    {
        return $this->belongsTo(VisaType::class, 'visa_types_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id');
    }

}
