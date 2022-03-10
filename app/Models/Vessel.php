<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vessel
 * @package App\Models
 * @version October 28, 2021, 4:57 pm UTC
 *
 * @property string $name
 * @property string $code
 * @property integer $company_id
 * @property integer $gross_tank
 * @property integer $omi_number
 * @property integer $active
 * @property integer $dwt
 * @property integer $engine
 * @property integer $vessel_type_id
 * @property integer $flags_id
 * @property string $machine_type
 */
class Vessel extends Model
{
    use SoftDeletes;

    public $table = 'vessels';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'code',
        'company_id',
        'gross_tank',
        'omi_number',
        'active',
        'dwt',
        'engine',
        'vessel_type_id',
        'flags_id',
        'machine_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'company_id' => 'integer',
        'gross_tank' => 'integer',
        'omi_number' => 'integer',
        'active' => 'boolean',
        'dwt' => 'integer',
        'engine' => 'integer',
        'vessel_type_id' => 'integer',
        'flags_id' => 'integer',
        'machine_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'code' => 'nullable',
        'company_id' => 'required',
        'gross_tank' => 'nullable',
        'omi_number' => 'nullable',
        'active' => 'nullable',
        'dwt' => 'nullable',
        'engine' => 'nullable',
        'vessel_type_id' => 'nullable',
        'flags_id' => 'nullable',
        'machine_type' => 'nullable,max:255'
    ];

    public function flag()
    {
        return $this->belongsTo(Flag::class, 'flags_id')->withDefault([
            'name' => ''
        ]);
    }

    public function vesselType()
    {
        return $this->belongsTo(VesselType::class, 'vessel_type_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
