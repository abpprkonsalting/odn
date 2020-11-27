<?php

namespace App\Http\Controllers;

use App\DataTables\OperationalInformationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOperationalInformationRequest;
use App\Http\Requests\UpdateOperationalInformationRequest;
use App\Repositories\OperationalInformationRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OperationalInformationController extends AppBaseController
{
    /** @var  OperationalInformationRepository */
    private $operationalInformationRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;

    public function __construct(OperationalInformationRepository $operationalInformationRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->operationalInformationRepository = $operationalInformationRepo;
        $this->personalInformationRepository = $personalInformationRepo;
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


        if (empty($operationalInformation)) {
            $personalInformation = $this->personalInformationRepository->find($id);
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

        $operationalInformation = $this->operationalInformationRepository->update($request->all(), $id);

        Flash::success('Operational Information updated successfully.');

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
        $operationalInformation = $this->operationalInformationRepository->find($id);

        if (empty($operationalInformation)) {
            Flash::error('Operational Information not found');

            return redirect(route('operationalInformations.index'));
        }

        $this->operationalInformationRepository->delete($id);

        Flash::success('Operational Information deleted successfully.');

        return redirect(route('operationalInformations.index'));
    }
}
