<?php

namespace App\Repositories;

use App\Models\Affiliate;
use App\Repositories\BaseRepository;

/**
 * Class AffiliateRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:40 pm UTC
*/

class AffiliateRepository extends BaseRepository
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
        return Affiliate::class;
    }
}
