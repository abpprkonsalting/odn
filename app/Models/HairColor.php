<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HairColor
 * @package App\Models
 * @version November 6, 2020, 8:30 pm UTC
 *
 * @property string $name
 */
class HairColor extends Model
{
    use SoftDeletes;

    public $table = 'hair_colors';
    

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
        'name' => 'required|unique:hair_colors|max:250'
    ];

    
}
