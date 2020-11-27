<?php

namespace App\Repositories;

use App\Models\OperationalInformation;
use App\Repositories\BaseRepository;

/**
 * Class OperationalInformationRepository
 * @package App\Repositories
 * @version November 15, 2020, 3:10 pm UTC
*/

class OperationalInformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_information_id',
        'disponibility_date',
        'ranks_id',
        'statuses_id',
        'description'
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
        return OperationalInformation::class;
    }
}
