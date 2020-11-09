<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Flag
 * @package App\Models
 * @version November 6, 2020, 9:35 pm UTC
 *
 * @property string $name
 */
class Flag extends Model
{
    use SoftDeletes;

    public $table = 'flags';
    

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
        'name' => 'required|max:250|unique:flags'
    ];

    
}
