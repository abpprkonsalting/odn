<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Passport
 * @package App\Models
 * @version November 15, 2020, 8:22 pm UTC
 *
 * @property integer $personal_informations_id
 * @property string $expedition_date
 * @property string $expiry_date
 * @property string $extension_date
 * @property string $no_passport
 */
class Passport extends Model
{
    use SoftDeletes;

    public $table = 'passports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'expedition_date',
        'expiry_date',
        'extension_date',
        'no_passport'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'expedition_date' => 'date',
        'expiry_date' => 'date',
        'extension_date' => 'date',
        'no_passport' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'expedition_date' => 'required',
        'expiry_date' => 'required',
        'extension_date' => 'nullable',
        'expiry_extension_date' => 'nullable',
        'no_passport' => 'required|max:50'
    ];

}
