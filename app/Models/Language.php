<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 * @package App\Models
 * @version November 6, 2020, 9:50 pm UTC
 *
 * @property string $name
 */
class Language extends Model
{
    use SoftDeletes;

    public $table = 'languages';
    

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
        'name' => 'required|unique:languages'
    ];

    
}
