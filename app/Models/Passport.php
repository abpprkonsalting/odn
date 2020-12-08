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
        'no_passport' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'expedition_date' => 'required|date|date_format:Y-m-d',
        'expiry_date' => 'required|date|date_format:Y-m-d',
        'extension_date' => 'date|date_format:Y-m-d',
        'expiry_extension_date' => 'date|date_format:Y-m-d',
        'no_passport' => 'required|max:50'
    ];

    public function getExpeditionDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 

    public function getExpiryDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 

    public function getExtensionDateAttribute($value) {
        if (!empty($value)) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
        }
        return $value;
    } 

    public function getExpiryExtensionDateAttribute($value) {
        if (!empty($value)) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
        }
        return $value;
    } 

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

}
