<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SkinColor
 * @package App\Models
 * @version November 17, 2020, 11:50 pm UTC
 *
 * @property string $name
 */
class SkinColor extends Model
{
    use SoftDeletes;

    public $table = 'skin_colors';
    

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
        'name' => 'required|max:250'
    ];

    
}
