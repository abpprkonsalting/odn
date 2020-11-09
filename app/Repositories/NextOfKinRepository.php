<?php

namespace App\Repositories;

use App\Models\NextOfKin;
use App\Repositories\BaseRepository;

/**
 * Class NextOfKinRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:21 pm UTC
*/

class NextOfKinRepository extends BaseRepository
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
        return NextOfKin::class;
    }
}
