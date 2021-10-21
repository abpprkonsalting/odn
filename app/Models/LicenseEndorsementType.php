<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LicenseEndorsementType
 * @package App\Models
 * @version December 2, 2020, 1:59 pm UTC
 *
 * @property string $name
 */
class LicenseEndorsementType extends Model
{
    use SoftDeletes;

    public $table = 'license_endorsement_types';
    

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