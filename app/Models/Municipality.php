<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Municipality
 * @package App\Models
 * @version November 6, 2020, 5:59 pm UTC
 *
 * @property integer $province_id
 * @property string $name
 */
class Municipality extends Model
{
    use SoftDeletes;

    public $table = 'municipalities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'province_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'province_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'province_id' => 'required',
        'name' => 'required|max:250'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    
}
