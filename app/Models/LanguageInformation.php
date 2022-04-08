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
        'personal_infomation_id',
        'language_id',
        'language_skill_id',
        'level_id'
       
    ];

     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_infomation_id' => 'integer',
        'language_id' => 'integer',
        'language_skill_id' => 'integer',
        'level_id' => 'integer'
    ];

      /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_infomation_id' => 'required',
        'language_id' => 'required',
        'language_skill_id' => 'required',
        'level_id' => 'required'
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_infomation_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function languageSkill()
    {
        return $this->belongsTo(LanguageSkill::class, 'language_skill_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
