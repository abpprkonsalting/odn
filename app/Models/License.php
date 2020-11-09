<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class License
 * @package App\Models
 * @version November 6, 2020, 9:16 pm UTC
 *
 * @property string $name
 */
class License extends Model
{
    use SoftDeletes;

    public $table = 'licenses';
    

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
        'name' => 'required|unique:licenses|max:250'
    ];

    
}
