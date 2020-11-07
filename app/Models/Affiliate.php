<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Affiliate
 * @package App\Models
 * @version November 6, 2020, 9:40 pm UTC
 *
 * @property string $name
 */
class Affiliate extends Model
{
    use SoftDeletes;

    public $table = 'affiliates';
    

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
        'name' => 'required|max:250|unique:affiliates'
    ];

    
}
