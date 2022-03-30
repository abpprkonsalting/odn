<?php

namespace App\Observers;

use App\Models\OperationalInformation;
use App\Models\SeaGoingExperience;
use App\Repositories\OperationalInformationRepository;
use App\Repositories\SeaGoingExperienceRepository;
use Carbon\Carbon;
use Flash;

class OperationalInformationObsever
{
    /** @var  OperationalInformationRepository */
    private $operationalInformationRepository;
    /** @var  SeaGoingExperienceRepository */
    private $seaGoingExperienceRepository;


    public function __construct(OperationalInformationRepository $operationalInformationRepo,
                                SeaGoingExperienceRepository $seaGoingExperienceRepository)
    {
        $this->operationalInformationRepository = $operationalInformationRepo;
        $this->seaGoingExperienceRepository = $seaGoingExperienceRepository;
    }

    /**
     * Handle the operational information "created" event.
     *
     * @param  \App\Models\OperationalInformation  $operationalInformation
     * @return void
     */
    public function created(OperationalInformation $operationalInformation)
    {
        //
    }

    /**
     * Handle the operational information "updated" event.
     *
     * @param  \App\Models\OperationalInformation  $operationalInformation
     * @return void
     */
    public function updated(OperationalInformation $operationalInformation)
    {
        
    }

    /**
     * Handle the operational information "updating" event.
     *
     * @param  \App\Models\OperationalInformation  $operationalInformation
     * @return void
     */
    public function updating(OperationalInformation $operationalInformation)
    {
        $status = $operationalInformation->status()->first();
        $operationalInformationId = $operationalInformation->id;
        $previousOI = $this->operationalInformationRepository->find($operationalInformationId);
        $previousStatus = $previousOI->status()->first();
        if ($status != $previousStatus && $previousStatus->is_on_board) {
            $newSeaGoingExperience = [];
            $newSeaGoingExperience['personal_information_id'] = $previousOI->personal_informations_id;
            $newSeaGoingExperience['rank_id'] = $previousOI->ranks_id;
            $newSeaGoingExperience['vessel_id'] = $previousOI->vessel_id;
            $newSeaGoingExperience['start_date'] = Carbon::createFromFormat('d-m-Y', $previousOI->disponibility_date)->format('Y-m-d');
            $newSeaGoingExperience['end_date'] = Carbon::createFromFormat('d-m-Y', $operationalInformation->disponibility_date)->subRealDay()->format('Y-m-d');
            $newSeaGoingExperience['status_id'] = $previousOI->statuses_id;
            $seaGoingExperience = $this->seaGoingExperienceRepository->create($newSeaGoingExperience);
            Flash::success('Sea going experience created successfully.');
        }
    }

    /**
     * Handle the operational information "deleted" event.
     *
     * @param  \App\Models\OperationalInformation  $operationalInformation
     * @return void
     */
    public function deleted(OperationalInformation $operationalInformation)
    {
        //
    }

    /**
     * Handle the operational information "restored" event.
     *
     * @param  \App\Models\OperationalInformation  $operationalInformation
     * @return void
     */
    public function restored(OperationalInformation $operationalInformation)
    {
        //
    }

    /**
     * Handle the operational information "force deleted" event.
     *
     * @param  \App\Models\OperationalInformation  $operationalInformation
     * @return void
     */
    public function forceDeleted(OperationalInformation $operationalInformation)
    {
        //
    }
}
