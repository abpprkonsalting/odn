<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class OtherSkill
 * @package App\Models
 * @version November 15, 2020, 9:41 pm UTC
 *
 * @property integer $personal_informations_id
 * @property string $skill_or_knowledge
 * @property string $place_or_school
 * @property string $knowledge_date
 * @property integer $empirical
 */
class OtherSkill extends Model
{
    use SoftDeletes;

    public $table = 'other_skills';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_informations_id',
        'skill_or_knowledge',
        'place_or_school',
        'knowledge_date',
        'empirical'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_informations_id' => 'integer',
        'skill_or_knowledge' => 'string',
        'place_or_school' => 'string',
        'knowledge_date' => 'datetime:Y-m-d',
        'empirical' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'skill_or_knowledge' => 'max:50|required',
        'place_or_school' => 'max:50|nullable',
        'knowledge_date' => 'date|date_format:Y-m-d',
        'empirical' => 'boolean'
    ];

    public function getKnowledgeDateAttribute($value) {
        if (!empty($value)) {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    } 
    return $value;
}
public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    
}
