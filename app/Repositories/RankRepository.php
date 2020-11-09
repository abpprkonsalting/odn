<?php

namespace App\Repositories;

use App\Models\Rank;
use App\Repositories\BaseRepository;

/**
 * Class RankRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:01 pm UTC
*/

class RankRepository extends BaseRepository
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
        return Rank::class;
    }
}
