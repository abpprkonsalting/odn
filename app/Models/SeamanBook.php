<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class SeamanBook
 * @package App\Models
 * @version December 4, 2020, 6:06 pm UTC
 *
 * @property string $number
 * @property string $issue_date
 * @property string $expiry_date
 */
class SeamanBook extends Model
{
    use SoftDeletes;

    public $table = 'seaman_books';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'number',
        'issue_date',
        'expiry_date',
        'personal_informations_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'string',
        'issue_date' => 'datetime:Y-m-d',
        'expiry_date' => 'datetime:Y-m-d',
        'personal_informations_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required',
        'personal_informations_id' => 'required',
        'issue_date' => 'required|date|date_format:d-m-Y',
        'expiry_date' => 'required|date|date_format:d-m-Y'
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

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }


    
}
