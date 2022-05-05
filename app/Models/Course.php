<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Course
 * @package App\Models
 * @version November 15, 2020, 7:14 pm UTC
 *
 * @property integer $personal_informations_id
 * @property integer $course_numbers_id
 * @property integer $country_id
 * @property string $issue_date
 * @property string $certificate_number
 */
class Course extends Model
{
    use SoftDeletes;

    public $table = 'courses';

    protected $dates = ['deleted_at'];

    protected $dateFormat = 'Y-m-d';

    public $fillable = [
        'personal_informations_id',
        'course_numbers_id',
        'country_id',
        'start_date',
        'end_date',
        'certificate_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'course_numbers_id' => 'integer',
        'country_id' => 'integer',
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'certificate_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'course_numbers_id' => 'required',
        'country_id' => 'required',
        'start_date' => 'required|date|date_format:d-m-Y',
        'end_date' => 'required|date|date_format:d-m-Y',
        'certificate_number' => 'required'
    ];

    public function getStartDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }

    public function getEndDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
    /**
     * Set the start date
     *
     * @param  string  $value
     * @return void
     */

    public function setStartDateAttribute($value)
    {
        if(!empty($value))
        {
            $this->attributes['start_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');

        }
    }
    /**
     * Set the issue date
     *
     * @param  string  $value
     * @return void
     */
    public function setEndDateAttribute($value)
    {
        if(!empty($value))
        {
            $this->attributes['end_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');

        }
    }

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function courseNumber()
    {
        return $this->belongsTo(CourseNumber::class, 'course_numbers_id');
    }


}
