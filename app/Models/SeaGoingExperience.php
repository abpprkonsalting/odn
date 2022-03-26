<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;



class SeaGoingExperience extends Model
{
    //
    use SoftDeletes;
    public $table = 'sea_going_experiences';
    protected $dates = ['deleted_at'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d';

    public $fillable = [
        'personal_information_id',
        'rank_id',
        'vessel_id',
        'status_id',
        'start_date',
        'end_date',
        'contract_time'
    ];

     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    protected $casts = [
        'id' => 'integer',
        'personal_information_id' => 'integer',
        'rank_id' => 'integer',
        'vessel_id' => 'integer',
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'contract_time' => 'integer'

        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_information_id' => 'required',
        'rank_id' => 'required',
        'status_id' => 'required',
        'vessel_id' => 'required',
        'start_date' => 'require|date|date_format:d-m-Y',
        'end_date' => 'require|date|date_format:d-m-Y',
        'contract_time' => 'nullable|max:10'
       
    ];

    public function personaInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_information_id');
    }
    /*
     get personal informations for seaGoingExeprience
    */

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
    }

    /*
     get rank for seaGoingExeprience
    */


    public function vessel()
    {
        return $this->belongsTo(Vessel::class, 'vessel_id');
    }

    /*
     get vessel for seaGoingExeprience
    */




}
