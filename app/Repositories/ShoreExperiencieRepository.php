<?php

namespace App\Repositories;

use App\Models\ShoreExperiencie;
use App\Repositories\BaseRepository;

/**
 * Class ShoreExperiencieRepository
 * @package App\Repositories
 * @version December 4, 2020, 3:03 pm UTC
*/

class ShoreExperiencieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'issue_date',
        'expiry_date'
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
        return ShoreExperiencie::class;
    }
}
