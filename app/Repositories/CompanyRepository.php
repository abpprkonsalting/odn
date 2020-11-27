<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version November 15, 2020, 10:32 pm UTC
*/

class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_informations_id',
        'company_name',
        'current',
        'vessel',
        'sign_on_date',
        'sign_off_date',
        'dtw',
        'gross_tonnage',
        'engine_types_id',
        'bph',
        'power_kw',
        'ranks_id',
        'flags_id',
        'total_salary',
        'leave_pay',
        'basic_salary',
        'fix_over_time',
        'contract_period'
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
        return Company::class;
    }
}
