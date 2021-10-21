<?php

namespace App\Repositories;

use App\Models\SkillOrKnowledge;
use App\Repositories\BaseRepository;

/**
 * Class SkillOrKnowledgeRepository
 * @package App\Repositories
 * @version October 21, 2021, 1:18 pm UTC
*/

class SkillOrKnowledgeRepository extends BaseRepository
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
        return SkillOrKnowledge::class;
    }
}
