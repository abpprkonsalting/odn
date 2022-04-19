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
 * @property integer $companies_id
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
        'companies_id',
        'gross_tank',
        'omi_number',
        'active',
        'dwt',
        'engine_power',
        'vessel_type_id',
        'flags_id',
        'engine_type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'companies_id' => 'integer',
        'gross_tank' => 'integer',
        'omi_number' => 'integer',
        'active' => 'boolean',
        'dwt' => 'integer',
        'engine_power' => 'integer',
        'vessel_type_id' => 'integer',
        'flags_id' => 'integer',
        'engine_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'code' => 'nullable',
        'companies_id' => 'required',
        'gross_tank' => 'nullable',
        'omi_number' => 'nullable',
        'active' => 'nullable',
        'dwt' => 'nullable',
        'engine_power' => 'nullable',
        'vessel_type_id' => 'nullable',
        'flags_id' => 'nullable',
        'engine_type_id' => 'nullable'
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
        return $this->belongsTo(Company::class, 'companies_id');
    }

    public function engineType()
    {
        return $this->belongsTo(EngineType::class, 'engine_type_id');
    }
}
