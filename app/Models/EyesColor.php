<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EyesColor
 * @package App\Models
 * @version November 6, 2020, 6:07 pm UTC
 *
 * @property string $name
 */
class EyesColor extends Model
{
    use SoftDeletes;

    public $table = 'eyes_colors';
    

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
        'name' => 'required|max:250|unique:eyes_colors'
    ];

    
}
