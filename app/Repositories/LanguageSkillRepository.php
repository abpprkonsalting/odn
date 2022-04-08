<?php

namespace App\Repositories;

use App\Models\LanguageSkill;
use App\Repositories\BaseRepository;

/**
 * Class LanguageSkillRepository
 * @package App\Repositories
 * @version April 7, 2022, 9:10 am UTC
*/

class LanguageSkillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LanguageSkill::class;
    }
}
