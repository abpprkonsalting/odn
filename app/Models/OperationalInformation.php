<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class OperationalInformation
 * @package App\Models
 * @version November 15, 2020, 3:10 pm UTC
 *
 * @property integer $personal_information_id
 * @property string $disponibility_date
 * @property integer $ranks_id
 * @property integer $statuses_id
 * @property string $description
 */
class OperationalInformation extends Model
{
    use SoftDeletes;

    public $table = 'operational_informations';


    protected $dates = ['deleted_at'];

    protected $dateFormat = 'Y-m-d';

    public $fillable = [
        'personal_informations_id',
        'disponibility_date',
        'ranks_id',
        'statuses_id',
        'description',
        'vessel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'disponibility_date' => 'datetime:Y-m-d',
        'ranks_id' => 'integer',
        'statuses_id' => 'integer',
        'description' => 'string',
        'vessel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'disponibility_date' => 'nullable|date|date_format:d-m-Y',
        'ranks_id' => 'required',
        'statuses_id' => 'required',
        'description' => 'nullable',
        'vessel_id' => 'nullable'
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'statuses_id');
    }

    public function vessel()
    {
        return $this->belongsTo(Vessel::class, 'vessel_id');
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'ranks_id');
    }

    public function getDisponibilityDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
        }
        return null;
    }

    /**
     * Set the disponibility date
     *
     * @param  string  $value
     * @return void
     */
    public function setDisponibilityDateAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['disponibility_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        }
    }
}
