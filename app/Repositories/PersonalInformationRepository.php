<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use App\Models\PersonalInformation;
use App\Models\Rank;
use App\Models\Status;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Repositories\OperationalInformationRepository;

/**
 * Class PersonalInformationRepository
 * @package App\Repositories
 * @version November 11, 2020, 10:34 pm UTC
*/

class PersonalInformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'internal_file_number',
        'external_file_number',
        'full_name',
        'id_number',
        'serial_number',
        'birthday',
        'birthplace',
        'province_id',
        'municipality_id',
        'address',
        'political_integration_id',
        'principal_phone',
        'secondary_phone',
        'cell_phone',
        'relevant_action',
        'skin_color',
        'sex',
        'eyes_color_id',
        'hair_color_id',
        'height',
        'weight',
        'particular_sings',
        'email',
        'marital_status_id',
        'school_grade_id',
        'avatar'
    ];

    private $operationalInformationRepository;

    public function __construct(Application $app, OperationalInformationRepository $operationalInformationRepository) {
        parent::__construct($app);
        $this->operationalInformationRepository = $operationalInformationRepository;
    }

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
        return PersonalInformation::class;
    }

    public function createPersonalInformation(Request $request)
    {
        $minimumRank = Rank::first();
        if (empty($minimumRank)) {
            throw new \Exception('Error: Before adding any mariner you should create at least one Rank.');
        }

        $input = $request->all();
        $file = $request->file('avatar');
        if (!empty($file)) {
            $extension = $file->getClientOriginalExtension();

            $path = '/uploads/'.uniqid().'.'.$extension;
            $img = Image::make($file);
            $img->save(public_path($path));

            $input['avatar'] = $path;
        } else {
            $input['avatar'] = env('DEFAULT_USER_IMAGE');
        }

        $model = $this->create($input);

        $now = Carbon::now()->format('d-m-Y');
        $operationalInformationData = [
            'personal_informations_id' => $model->id,
            'disponibility_date' => $now,
            'ranks_id' => $minimumRank->id,
            'statuses_id' => Status::where('name','Non Ready')->first()->id
        ];
        $operationalInformation = $this->operationalInformationRepository->create($operationalInformationData);

        return $model;
    }

    public function updatePersonalInformation(Request $request, $id, $personalInformation)
    {
        $input = $request->all();
        $file = $request->file('avatar');
        if (!empty($file)) {
            $extension = $file->getClientOriginalExtension();

            $path = '/uploads/'.uniqid().'.'.$extension;
            $img = Image::make($file);
            $img->save(public_path($path));

            $input['avatar'] = $path;

            if ($personalInformation->avatar != env('DEFAULT_USER_IMAGE') && file_exists(public_path() . $personalInformation->avatar)) {
                unlink(public_path() . $personalInformation->avatar);
            }

        } else {
           unset($input['avatar']);
        }

        return $this->update($input, $id);
    }
}
