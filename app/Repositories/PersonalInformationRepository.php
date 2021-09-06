<?php

namespace App\Repositories;

use App\Models\PersonalInformation;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

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
        
        return $this->create($input);
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
