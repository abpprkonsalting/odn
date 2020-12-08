<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FamilyStatus
 * @package App\Models
 * @version December 6, 2020, 1:11 pm UTC
 *
 * @property string $name
 */
class FamilyStatus extends Model
{
    use SoftDeletes;

    public $table = 'family_statuses';
    

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
