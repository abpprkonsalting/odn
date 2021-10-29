<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyMission extends Model
{
    use SoftDeletes;

    public $table = 'company_mission';
    

    protected $dates = ['deleted_at'];
}
