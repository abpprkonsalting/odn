<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SkillOrKnowledge
 * @package App\Models
 * @version October 21, 2021, 1:18 pm UTC
 *
 * @property string $name
 */
class SkillOrKnowledge extends Model
{
    use SoftDeletes;

    public $table = 'skill_or_knowledges';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
    public function otherSkills() {
        return $this->hasMany(OtherSkill::class, 'skill_or_knowledge_id');
    }

    
}
