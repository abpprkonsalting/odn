<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PersonalMedicalInformation
 * @package App\Models
 * @version November 15, 2020, 7:44 pm UTC
 *
 * @property integer $personal_informations_id
 * @property integer $medical_informations_id
 * @property string $issue_date
 * @property string $expiry_date
 */
class PersonalMedicalInformation extends Model
{
    use SoftDeletes;

    public $table = 'personal_medical_informations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'medical_informations_id',
        'issue_date',
        'expiry_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'medical_informations_id' => 'integer',
        'issue_date' => 'date',
        'expiry_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'medical_informations_id' => 'required',
        'issue_date' => 'required',
        'expiry_date' => 'required'
    ];

    
}
