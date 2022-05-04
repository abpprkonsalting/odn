<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use App\Models\Visa;
use App\Models\PersonalInformation;

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
        'no_passport',
        'countries_id'
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
        'passport_group' => 'string',
        'countries_id' => 'integer'
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
        'no_passport' => 'required|max:50',
        'countries_id' => 'required'
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
        if (!empty($value)) {
            $this->attributes['expedition_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
            return;
        }
        $this->attributes['expedition_date'] = null;
    }

    public function getExpiryDateAttribute($value) {
        if (!empty($value)) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
        }
        return $value;
    }

    public function setExpiryDateAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['expiry_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
            return;
        }
        $this->attributes['expiry_date'] = null;
    }

    public function getExtensionDateAttribute($value) {
        if (!empty($value)) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
        }
        return $value;
    }

    public function setExtensionDateAttribute($value)

    {
        if (!empty($value)) {
            $this->attributes['extension_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
            return;
        }
        $this->attributes['extension_date'] = null;
     }

    public function getExpiryExtensionDateAttribute($value) {
        if (!empty($value)) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
        }
        return $value;
    }

    public function setExpiryExtensionDateAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['expiry_extension_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
            return;
        }
        $this->attributes['expiry_extension_date'] = null;
    }

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id');
    }

    public function visas() {
        return $this->hasMany(Visa::class, 'passports_id');
    }

}
