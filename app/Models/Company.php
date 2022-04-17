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
        'company_name',
        'flags_id',
        'code',
        'description',
        'phone',
        'fax',
        'email', 
        'contact',
        'company_type_id',
        'company_mission_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_type_id' => 'integer',
        'company_mission_id' => 'integer',
        'company_name' => 'string',
        'contact' => 'string',
        'email' => 'string',
        'fax' => 'string',
        'phone' => 'string',
        'description' => 'string',
        'code' => 'string',
        'flags_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_name' => 'required|max:500',
        'code' => 'nullable|max:255',
        'description' => 'nullable|max:1000',
        'phone' => 'nullable|max:255',
        'fax' => 'nullable|max:255',
        'email' => 'nullable|email|max:255',
        'contact' => 'nullable|max:255',
        'flags_id' => 'nullable|integer',
        'company_mission_id' => 'nullable|integer',
        'company_type_id' => 'nullable|integer',
    ];

    public function companyMission()
    {
        return $this->belongsTo(CompanyMission::class, 'company_mission_id');
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }

    public function flag()
    {
        return $this->belongsTo(Flag::class, 'flags_id');
    }

    public function personal_informations() {
        return $this->hasMany(PersonalInformation::class);
    }
}
