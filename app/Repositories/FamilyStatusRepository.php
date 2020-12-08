<?php

namespace App\Repositories;

use App\Models\FamilyStatus;
use App\Repositories\BaseRepository;

/**
 * Class FamilyStatusRepository
 * @package App\Repositories
 * @version December 6, 2020, 1:11 pm UTC
*/

class FamilyStatusRepository extends BaseRepository
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
        return FamilyStatus::class;
    }
}
