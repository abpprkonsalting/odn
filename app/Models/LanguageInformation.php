<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class LanguageInformation extends Model
{
    use SoftDeletes;

    public $table = 'language_informations';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'personal_informations_id',
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
        'personal_informations_id' => 'integer',
        'languages_id' => 'integer',
        'language_skills_id' => 'integer',
        'levels_id' => 'integer'
    ];

      /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'personal_informations_id' => 'required',
        'languages_id' => 'required',
        'language_skills_id' => 'required',
        'levels_id' => 'required'
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_informations_id');
    }

    public function language()
    {
        $bla = $this->belongsTo(Language::class, 'languages_id');
        return $bla;
    }

    public function languageSkill()
    {
        $bla = $this->belongsTo(LanguageSkill::class, 'language_skills_id');
        return $bla;
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'levels_id');
    }
}
