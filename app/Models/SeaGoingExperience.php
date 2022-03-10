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
        'personal_informations_id',
        'ranks_id',
        'vessels_id',
        'statuses_id',
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
        'personal_informations_id' => 'integer',
        'ranks_id' => 'integer',
        'vessels_id' => 'integer',
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'contract_time' => 'integer'

        
    ];

}
