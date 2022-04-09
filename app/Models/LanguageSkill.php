<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class LanguageSkill
 * @package App\Models
 *
 *
 * @property string $name
 *
 */

class LanguageSkill extends Model
{
    use SoftDeletes;

    public $table = 'language_skills';
    
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
        'name' => 'required'
    ];
}
