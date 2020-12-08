<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LicenseEndorsementName
 * @package App\Models
 * @version December 2, 2020, 3:01 pm UTC
 *
 * @property string $name
 * @property integer $license_endorsement_types_id
 */
class LicenseEndorsementName extends Model
{
    use SoftDeletes;

    public $table = 'license_endorsement_names';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'license_endorsement_types_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'license_endorsement_types_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:250',
        'license_endorsement_types_id' => 'required'
    ];

    public function type()
    {
        return $this->belongsTo(LicenseEndorsementType::class, 'license_endorsement_types_id');
    }

    
}
