<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyType extends Model
{
    use SoftDeletes;

    public $table = 'company_type';
    

    protected $dates = ['deleted_at'];
}
