<?php

namespace App\Repositories;

use App\Models\OtherSkill;
use App\Repositories\BaseRepository;

/**
 * Class OtherSkillRepository
 * @package App\Repositories
 * @version November 15, 2020, 9:41 pm UTC
*/

class OtherSkillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_informations_id',
        'skill_or_knowledge',
        'place_or_school',
        'knowledge_date',
        'empirical'
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
        return OtherSkill::class;
    }
}
