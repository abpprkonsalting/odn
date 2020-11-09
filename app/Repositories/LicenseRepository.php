<?php

namespace App\Repositories;

use App\Models\License;
use App\Repositories\BaseRepository;

/**
 * Class LicenseRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:16 pm UTC
*/

class LicenseRepository extends BaseRepository
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
        return License::class;
    }
}
