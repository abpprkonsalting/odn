<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SchoolGrade
 * @package App\Models
 * @version November 6, 2020, 8:50 pm UTC
 *
 * @property string $name
 */
class SchoolGrade extends Model
{
    use SoftDeletes;

    public $table = 'school_grades';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:school_grades|max:250'
    ];

    
}
