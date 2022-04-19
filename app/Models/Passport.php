<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Passport
 * @package App\Models
 * @version November 15, 2020, 8:22 pm UTC
 *
 * @property integer $personal_informations_id
 * @property string $expedition_date
 * @property string $expiry_date
 * @property string $extension_date
 * @property string $no_passport
 */
class Passport extends Model
{
    use SoftDeletes;

    public $table = 'passports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'expedition_date',
        'expiry_date',
        'extension_date',
        'expiry_extension_date',
        'passport_group',
        'no_passport'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'expedition_date' => 'datetime:Y-m-d',
        'expiry_date' => 'datetime:Y-m-d',
        'extension_date' => 'datetime:Y-m-d',
        'expiry_extension_date'=>'datetime:Y-m-d',
        'no_passport' => 'string',
        'passport_group' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'expedition_date' => 'required|date|date_format:d-m-Y',
        'expiry_date' => 'required|date|date_format:d-m-Y',
        'extension_date' => 'nullable|date|date_format:d-m-Y',
        'expiry_extension_date' => 'nullable|date|date_format:d-m-Y',
        'no_passport' => 'required|max:50'
    ];

    public function getExpeditionDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    } 

    /**
     * Set the memo date
     *
     * @param  string  $value
     * @return void
     */
    public function setExpeditionDateAttribute($value)
    {
        $this->attributes['expedition_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
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

    public function getExtensionDateAttribute($value) {
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
    public function setExtensionDateAttribute($value)

    {
       
        $this->attributes['extension_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
     }

    public function getExpiryExtensionDateAttribute($value) {
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
    public function setExpiryExtensionDateAttribute($value)
    {
        $this->attributes['expiry_extension_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

}
