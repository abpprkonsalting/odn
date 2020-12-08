<?php

namespace App\Repositories;

use App\Models\Visa;
use App\Repositories\BaseRepository;

/**
 * Class VisaRepository
 * @package App\Repositories
 * @version December 3, 2020, 5:04 pm UTC
*/

class VisaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'visa_types_id',
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
        return Visa::class;
    }
}
