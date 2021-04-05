<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Memo
 * @package App\Models
 * @version November 15, 2020, 6:39 pm UTC
 *
 * @property integer $personal_informations_id
 * @property string $note
 * @property string $memo_date
 */
class Memo extends Model
{
    use SoftDeletes;

    public $table = 'memos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'note',
        'memo_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'note' => 'string',
        'memo_date' => 'datetime:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'note' => 'nullable',
        'memo_date' => 'required|date|date_format:d-m-Y'
    ];

    public function getMemoDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    } 
    
     /**
     * Set the memo date
     *
     * @param  string  $value
     * @return void
     */
    public function setMemoDateAttribute($value)
    {
        $this->attributes['memo_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

}
