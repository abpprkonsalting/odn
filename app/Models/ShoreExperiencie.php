<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class ShoreExperiencie
 * @package App\Models
 * @version December 4, 2020, 3:03 pm UTC
 *
 * @property string $name
 * @property string $issue_date
 * @property string $expiry_date
 */
class ShoreExperiencie extends Model
{
    use SoftDeletes;

    public $table = 'shore_experiencies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'name',
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
        'name' => 'string',
        'issue_date' => 'datetime:Y-m-d',
        'expiry_date' => 'datetime:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'personal_informations_id' => 'required',
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

    
}
