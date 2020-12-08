<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Company
 * @package App\Models
 * @version November 15, 2020, 10:32 pm UTC
 *
 * @property integer $personal_informations_id
 * @property string $company_name
 * @property integer $current
 * @property string $vessel
 * @property string $sign_on_date
 * @property string $sign_off_date
 * @property integer $dtw
 * @property integer $gross_tonnage
 * @property integer $engine_types_id
 * @property integer $bph
 * @property integer $power_kw
 * @property integer $ranks_id
 * @property integer $flags_id
 * @property number $total_salary
 * @property number $leave_pay
 * @property number $basic_salary
 * @property number $fix_over_time
 * @property integer $contract_period
 */
class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'company_name',
        'current',
        'vessel',
        'sign_on_date',
        'sign_off_date',
        'dtw',
        'gross_tonnage',
        'engine_types_id',
        'bph',
        'power_kw',
        'ranks_id',
        'flags_id',
        'total_salary',
        'leave_pay',
        'basic_salary',
        'fix_over_time',
        'contract_period'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'company_name' => 'string',
        'current' => 'bool',
        'vessel' => 'string',
        'sign_on_date' => 'datetime:Y-m-d',
        'sign_off_date' => 'datetime:Y-m-d',
        'dtw' => 'integer',
        'gross_tonnage' => 'integer',
        'engine_types_id' => 'integer',
        'bph' => 'integer',
        'power_kw' => 'integer',
        'ranks_id' => 'integer',
        'flags_id' => 'integer',
        'total_salary' => 'decimal:2',
        'leave_pay' => 'decimal:2',
        'basic_salary' => 'decimal:2',
        'fix_over_time' => 'decimal:2',
        'contract_period' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'company_name' => 'required|max:50',
        'current' => 'boolean',
        'vessel' => 'nullable',
        'sign_on_date' => 'date|date_format:Y-m-d',
        'sign_off_date' => 'date|date_format:Y-m-d',
        'dtw' => 'nullable',
        'gross_tonnage' => 'nullable',
        'engine_types_id' => 'nullable',
        'bph' => 'nullable',
        'power_kw' => 'nullable|integer',
        'ranks_id' => 'nullable',
        'flags_id' => 'nullable|integer',
        'total_salary' => 'nullable|numeric',
        'leave_pay' => 'nullable|numeric',
        'basic_salary' => 'nullable|numeric',
        'fix_over_time' => 'nullable|numeric',
        'contract_period' => 'nullable|integer'
    ];


    public function getSignOnDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 
    public function getSignOffDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }
    public function engineType()
    {
        return $this->belongsTo(EngineType::class, 'engine_types_id');
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'ranks_id');
    }
    public function flag()
    {
        return $this->belongsTo(Flag::class, 'flags_id');
    }

    
}
