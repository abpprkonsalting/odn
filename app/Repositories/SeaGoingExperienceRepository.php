<?php

namespace App\Repositories;

use App\Models\SeaGoingExperience;
use App\Repositories\BaseRepository;

/**
 * Class SeaGoingExperienceRepository
 * @package App\Repositories
 * @version October 28, 2021, 4:57 pm UTC
*/

class SeaGoingExperienceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'personal_information_id',
        'rank_id',
        'vessel_id',
        'start_date',
        'end_date' ,
        'contract_time'      
        
      
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
        return SeaGoingExperience::class;
    }
}
