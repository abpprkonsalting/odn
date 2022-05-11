<?php

namespace App\Http\Controllers;

use App\DataTables\OperationalInformationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOperationalInformationRequest;
use App\Http\Requests\UpdateOperationalInformationRequest;
use App\Repositories\OperationalInformationRepository;
use App\Repositories\PersonalInformationRepository;
use App\Repositories\SeaGoingExperienceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Status;
use App\Services\StatusService;
use Illuminate\Support\Carbon;

class OperationalInformationController extends AppBaseController
{
    /** @var  OperationalInformationRepository */
    private $operationalInformationRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;
    /** @var  SeaGoingExperienceRepository */
    private $seaGoingExperienceRepository;

    private $statusService;

    public function __construct(OperationalInformationRepository $operationalInformationRepo,
                                PersonalInformationRepository $personalInformationRepo,
                                StatusService $statusService,
                                SeaGoingExperienceRepository $seaGoingExperienceRepository)
    {
        $this->operationalInformationRepository = $operationalInformationRepo;
        $this->personalInformationRepository = $personalInformationRepo;
        $this->statusService = $statusService;
        $this->seaGoingExperienceRepository = $seaGoingExperienceRepository;
    }

    /**
     * Display a listing of the OperationalInformation.
     *
     * @param OperationalInformationDataTable $operationalInformationDataTable
     * @return Response
     */
    public function index(OperationalInformationDataTable $operationalInformationDataTable)
    {
        return $operationalInformationDataTable->render('operational_informations.index');
    }

    /**
     * Show the form for creating a new OperationalInformation.
     *
     * @return Response
     */
    public function create()
    {
        return view('operational_informations.create');
    }

    /**
     * Store a newly created OperationalInformation in storage.
     *
     * @param CreateOperationalInformationRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationalInformationRequest $request)
    {
        $input = $request->all();

        $operationalInformation = $this->operationalInformationRepository->create($input);

        Flash::success('Operational Information saved successfully.');

        return redirect(route('operationalInformations.edit', $operationalInformation->personal_informations_id));
    }

    /**
     * Display the specified OperationalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $operationalInformation = $this->operationalInformationRepository->find($id);

        if (empty($operationalInformation)) {
            Flash::error('Operational Information not found');

            return redirect(route('operationalInformations.index'));
        }

        return view('operational_informations.show')->with('operationalInformation', $operationalInformation);
    }

    /**
     * Show the form for editing the specified OperationalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //$operationalInformation = $this->operationalInformationRepository->find($id);
        $operationalInformationModel = $this->operationalInformationRepository->model();
        $operationalInformation = $operationalInformationModel::where(['personal_informations_id' => $id])->first();

        $personalInformation = $this->personalInformationRepository->find($id);
        $this->statusService->checkPersonalInformationStatus($personalInformation);
        if (empty($operationalInformation)) {
            return view('operational_informations.create')->with('personalInformation', $personalInformation);
        }
        return view('operational_informations.edit')->with('operationalInformation', $operationalInformation);
    }

    /**
     * Update the specified OperationalInformation in storage.
     *
     * @param  int              $id
     * @param UpdateOperationalInformationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationalInformationRequest $request)
    {
        $operationalInformation = $this->operationalInformationRepository->find($id);

        if (empty($operationalInformation)) {
            Flash::error('Operational Information not found');
            return redirect(route('operationalInformations.index'));
        }
        $previousStatusId = $operationalInformation->statuses_id;
        $personalInformation = $operationalInformation->personalInformation()->first();
        $realStatusReport = $this->statusService->checkPersonalInformationStatus($personalInformation,true);

        $reqAttribs = $request->all();
        $toSaveStatusesId = $reqAttribs['statuses_id'];

        if (!$this->checkStatusChangePossible($toSaveStatusesId, $realStatusReport,$personalInformation)) {
            $operationalInformation->refresh();
            $operationalInformation->statuses_id = $previousStatusId;
            $operationalInformation->save();
            return redirect(route('operationalInformations.edit', $operationalInformation->personal_informations_id));
        }
        $this->createSeaGoingExperience($operationalInformation,$reqAttribs);
        $operationalInformation = $this->operationalInformationRepository->update($reqAttribs, $id);
        Flash::message('Operational Information updated successfully.');
        return redirect(route('operationalInformations.edit', $operationalInformation->personal_informations_id));
    }

    /**
     * Remove the specified OperationalInformation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {


        try{

            $this->operationalInformationRepository->find($id)->forcedelete();

            Flash::success('Operational Information deleted successfully.');

             }
         catch(\Illuminate\Database\QueryException $ex){


            Flash::error('The Operational Information can not be deleted. Probably it\'s been used by other entity');

             }
        finally{
            return redirect(route('operationalInformations.index'));
        }



    }

    private function checkStatusChangePossible($newStatusId, $realStatusReport,$personalInformation): bool {

        $nonReadyStatusId = Status::where(['name' => "Non Ready"])->first()->id;
        $readyStatusId = Status::where(['name' => "Ready"])->first()->id;
        $onBoardStatusId = Status::where(['name' => "On Board"])->first()->id;
        $onVacationStatusId = Status::where(['name' => "On Vacation"])->first()->id;
        $dismissedStatusId = Status::where(['name' => "Dismissed"])->first()->id;

        $realStatus = empty($realStatusReport) ? 'Other' : (collect($realStatusReport)->flatten()->contains(false) ? 'Non Ready' : 'Ready');

        switch ($newStatusId) {
            case  $nonReadyStatusId:
                if ($realStatus == 'Ready') {
                    Flash::error('Can not set mariner status to \'Non Ready\'; The mariner meets all necessary conditions for the \'Ready\' status. Please check
                    his passports, medical information, courses, licenses & seamanbook in order to change it\'s real availability for sailing.');
                    return false;
                }
                else if ($realStatus == 'Other') {
                    $personalInformation->operationalInformation->statuses_id = $nonReadyStatusId;
                    $personalInformation->operationalInformation->save();
                    $personalInformation = $personalInformation->refresh();
                    $realStatusReport = $this->statusService->checkPersonalInformationStatus($personalInformation,true);
                    $realStatus = collect($realStatusReport)->flatten()->contains(false) ? 'Non Ready' : 'Ready';
                    if ($realStatus == 'Non Ready') {
                        return true;
                    }
                    else {
                        Flash::error('Can not set mariner status to \'Non Ready\'; The mariner meets all necessary conditions for the \'Ready\' status. Please check
                        his passports, medical information, courses, licenses & seamanbook in order to change it\'s real availability for sailing.');
                        return false;
                    }
                }
                return true;
                break;
            case  $readyStatusId:
                if ($realStatus == 'Non Ready') {
                    Flash::error('Can not set mariner status to \'Ready\'; The mariner does not meet all necessary conditions for that status. Please check
                    his passports, medical information, courses, licenses & seamanbook');
                    return false;
                }
                else if ($realStatus == 'Other') {
                    $personalInformation->operationalInformation->statuses_id = $readyStatusId;
                    $personalInformation->operationalInformation->save();
                    $personalInformation = $personalInformation->refresh();
                    $realStatusReport = $this->statusService->checkPersonalInformationStatus($personalInformation,true);

                    $realStatus = collect($realStatusReport)->flatten()->contains(false) ? 'Non Ready' : 'Ready';
                    if ($realStatus == 'Non Ready') {
                        Flash::error('Can not set mariner status to \'Ready\'; The mariner does not meet all necessary conditions for that status. Please check
                        his passports, medical information, courses, licenses & seamanbook');
                        return false;
                    }
                }
                return true;
                break;
            case  $onBoardStatusId:
                if ($realStatus == 'Non Ready') {
                    Flash::error('Can not set mariner status to \'On Board\'; The mariner does not meet all necessary conditions for \'Ready\' status. Please check
                    his passports, medical information, courses, licenses & seamanbook');
                    return false;
                }
                else if ($realStatus == 'Other') {
                    $personalInformation->operationalInformation->statuses_id = $readyStatusId;
                    $personalInformation->operationalInformation->save();
                    $personalInformation = $personalInformation->refresh();
                    $realStatusReport = $this->statusService->checkPersonalInformationStatus($personalInformation,true);
                    $realStatus = collect($realStatusReport)->flatten()->contains(false) ? 'Non Ready' : 'Ready';
                    if ($realStatus == 'Non Ready') {
                        Flash::error('Can not set mariner status to \'On Board\'; The mariner does not meet all necessary conditions for \'Ready\' status. Please check
                        his passports, medical information, courses, licenses & seamanbook');
                        return false;
                    }
                }
                return true;
                break;
            case  $onVacationStatusId:
            case  $dismissedStatusId:
                return true;
                break;
        }
        return true;
    }

    private function createSeaGoingExperience($operationalInformation,$reqAttribs) {

        $onBoardStatusId = Status::where(['name' => "On Board"])->first()->id;
        $previousStatusId = $operationalInformation->status()->first()->id;

        if ($reqAttribs['statuses_id'] != $previousStatusId && $previousStatusId == $onBoardStatusId) {
            $newSeaGoingExperience = [];
            $newSeaGoingExperience['personal_information_id'] = $operationalInformation->personal_informations_id;
            $newSeaGoingExperience['rank_id'] = $operationalInformation->ranks_id;
            $newSeaGoingExperience['vessel_id'] = $operationalInformation->vessel_id;
            $newSeaGoingExperience['start_date'] = Carbon::createFromFormat('d-m-Y', $operationalInformation->disponibility_date)->format('d-m-Y');
            $newSeaGoingExperience['end_date'] = Carbon::createFromFormat('d-m-Y', $reqAttribs['disponibility_date'])->subRealDay()->format('d-m-Y');
            $newSeaGoingExperience['status_id'] = $operationalInformation->statuses_id;
            $seaGoingExperience = $this->seaGoingExperienceRepository->create($newSeaGoingExperience);
            Flash::success('Sea going experience created successfully.');
        }
    }
}
