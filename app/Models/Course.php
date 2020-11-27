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
 * @property integer $provinces_id
 * @property string $issue_date
 * @property string $certificate_number
 */
class Course extends Model
{
    use SoftDeletes;

    public $table = 'courses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'course_numbers_id',
        'provinces_id',
        'issue_date',
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
        'provinces_id' => 'integer',
        'issue_date' => 'datetime:Y-m-d',
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
        'provinces_id' => 'required',
        'issue_date' => 'required|date|date_format:Y-m-d',
        'certificate_number' => 'required'
    ];

    public function getIssueDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function courseNumber()
    {
        return $this->belongsTo(CourseNumber::class, 'course_numbers_id');
    }

    
}
