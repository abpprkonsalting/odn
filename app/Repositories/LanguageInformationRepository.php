<?php

namespace App\Repositories;

use App\Models\LanguageInformation;
use App\Repositories\BaseRepository;

/**
 * Class LanguageInformationRepository
 * @package App\Repositories
 * @version April 7, 2022, 7:14 am UTC
*/

class LanguageInformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_infomation_id',
        'language_id',
        'language_skill_id',
        'level_id'
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
        return LanguageInformation::class;
    }
}
