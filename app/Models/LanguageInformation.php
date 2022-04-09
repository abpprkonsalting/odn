<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class LanguageInformation extends Model
{
    use SoftDeletes;

    public $table = 'language_infomations';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'personal_infomations_id',
        'languages_id',
        'language_skills_id',
        'levels_id'
       
    ];

     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_infomations_id' => 'integer',
        'languages_id' => 'integer',
        'languages_skill_id' => 'integer',
        'levels_id' => 'integer'
    ];

      /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_infomations_id' => 'required',
        'languages_id' => 'required',
        'languages_skill_id' => 'required',
        'levels_id' => 'required'
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_infomations_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'languages_id');
    }

    public function languageSkill()
    {
        return $this->belongsTo(LanguageSkill::class, 'languages_skill_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'levels_id');
    }
}
