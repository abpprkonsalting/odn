<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CourseNumber
 * @package App\Models
 * @version November 6, 2020, 9:10 pm UTC
 *
 * @property string $name
 */
class CourseNumber extends Model
{
    use SoftDeletes;

    public $table = 'course_numbers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'sort',
        'code',
    ];

    protected $attributes = [
        'sort' => 0, 
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'sort'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:500|unique:course_numbers',
        'sort' => 'nullable'
    ];

    
}
