<?php

namespace App\Repositories;

use App\Models\VisaType;
use App\Repositories\BaseRepository;

/**
 * Class VisaTypeRepository
 * @package App\Repositories
 * @version December 3, 2020, 4:53 pm UTC
*/

class VisaTypeRepository extends BaseRepository
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
        return VisaType::class;
    }
}
