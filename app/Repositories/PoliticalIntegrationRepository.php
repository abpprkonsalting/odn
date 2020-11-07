<?php

namespace App\Repositories;

use App\Models\PoliticalIntegration;
use App\Repositories\BaseRepository;

/**
 * Class PoliticalIntegrationRepository
 * @package App\Repositories
 * @version November 6, 2020, 8:56 pm UTC
*/

class PoliticalIntegrationRepository extends BaseRepository
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
        return PoliticalIntegration::class;
    }
}
