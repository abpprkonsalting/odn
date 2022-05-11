<?php

namespace App\Http\Controllers;

use App\DataTables\SeaGoingExperienceDataTable;
use App\Http\Requests\CreateSeaGoingExperienceRequest;
use App\Http\Requests\UpdateSeaGoingExperienceRequest;
use App\Repositories\SeaGoingExperienceRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;
use App\Models\SeaGoingExperience;

class SeaGoingExperienceController extends Controller
{
    /** @var  SeaGoingExperienceRepository */
    private $seaGoingExperienceRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;


    public function __construct(SeaGoingExperienceRepository $seaGoingExperienceRepository, PersonalInformationRepository $personalInformationRepository)
    {
        $this->seaGoingExperienceRepository = $seaGoingExperienceRepository;
        $this->personalInformationRepository = $personalInformationRepository;
    }

    /**
     * Display a listing of the Course.
     *
     * @param SeaGoingExperienceDataTable $courseDataTable
     * @return Response
     */

    public function index(SeaGoingExperienceDataTable $seaGoingExperienceDataTable)
    {
        return $seaGoingExperienceDataTable->render('sea_going_experiences.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if (isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepository->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if (!empty($personalInformation)) {
                return view('sea_going_experiences.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('SeaGoing Experience not found');
        return redirect(route('seaGoingExperiences.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  @param CreateSeaGoingExperienceRequest $request
     * @return Response
     */
    public function store(CreateSeaGoingExperienceRequest  $request)
    {
        $input = $request->all();
        $seaGoingExperience = $this->seaGoingExperienceRepository->create($input);
        Flash::success('SeaGoing Experience saved successfully.');
        return redirect(route('seaGoingExperiences.create', ['id' => $seaGoingExperience->personal_informations_id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);

        if (empty($seaGoingExperience)) {
            Flash::error('SeaGoing Experience not found');
            return redirect(route('seaGoingExperiences.index'));
        }
        return view('sea_going_experiences.show')->with('seaGoingExperience', $seaGoingExperience);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);

        if (empty($seaGoingExperience)) {
            Flash::error('SeaGoing Experience not found');
            return redirect(route('seaGoingExperiences.index'));
        }

        return view('sea_going_experiences.edit')->with([
            'seaGoingExperience' => $seaGoingExperience,
            'personalInformation' => $seaGoingExperience->personalInformation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSeaGoingExperienceRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateSeaGoingExperienceRequest $request, $id)
    {
        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);

        if (empty($seaGoingExperience)) {
            Flash::error('SeaGoing Experience not found');
            return redirect(route('seaGoingExperiences.index'));
        }
        $seaGoingExperience = $this->seaGoingExperienceRepository->update($request->all(), $id);
        Flash::success('SeaGoing Experience updated successfully.');
        return redirect(route('seaGoingExperiences.create', ['id' => $seaGoingExperience->personal_information_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);
        $personalInformationId = $seaGoingExperience->personal_information_id;
        try {
            $seaGoingExperience->forcedelete();
            Flash::success('SeaGoing Experience deleted successfully.');

        } catch (\Illuminate\Database\QueryException $ex) {
            Flash::error('The SeaGoing Experience can not be deleted. Probably it\'s been used by other entity');

        } finally {
            return redirect(route('seaGoingExperiences.create', ['id' => $personalInformationId]));
        }
    }

    public function getPersonalInformationSeaGoingExperience($id)
    {
        $seaGoingExperienceModel = $this->seaGoingExperienceRepository->model();
        return Datatables::of($seaGoingExperienceModel::with(['rank', 'vessel', 'status'])->where(['personal_information_id' => $id])->get())
            ->addColumn('action', 'sea_going_experiences.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    }
}
