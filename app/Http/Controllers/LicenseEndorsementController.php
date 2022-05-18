<?php

namespace App\Http\Controllers;

use App\DataTables\LicenseEndorsementDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLicenseEndorsementRequest;
use App\Http\Requests\UpdateLicenseEndorsementRequest;
use App\Repositories\LicenseEndorsementRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Response;

class LicenseEndorsementController extends AppBaseController
{
    /** @var  LicenseEndorsementRepository */
    private $licenseEndorsementRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;

    public function __construct(LicenseEndorsementRepository $licenseEndorsementRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->licenseEndorsementRepository = $licenseEndorsementRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the LicenseEndorsement.
     *
     * @param LicenseEndorsementDataTable $licenseEndorsementDataTable
     * @return Response
     */
    public function index(LicenseEndorsementDataTable $licenseEndorsementDataTable)
    {
        return $licenseEndorsementDataTable->render('license_endorsements.index');
    }

    /**
     * Show the form for creating a new LicenseEndorsement.
     *
     * @return Response
     */
    public function create(Request $request)
    {


        if (isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if (!empty($personalInformation)) {
                return view('license_endorsements.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('License Endorsement not found');
        return redirect(route('personalInformations.index'));
    }

    /**
     * Store a newly created LicenseEndorsement in storage.
     *
     * @param CreateLicenseEndorsementRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseEndorsementRequest $request)
    {
        $input = $request->all();

        $licenseEndorsement = $this->licenseEndorsementRepository->create($input);

        Flash::success('License Endorsement saved successfully.');

        return redirect(route('licenseEndorsements.create', ['id' => $licenseEndorsement->personal_informations_id]));
    }

    /**
     * Display the specified LicenseEndorsement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $licenseEndorsement = $this->licenseEndorsementRepository->find($id);

        if (empty($licenseEndorsement)) {
            Flash::error('License Endorsement not found');

            return redirect(route('licenseEndorsements.index'));
        }

        return view('license_endorsements.show')->with('licenseEndorsement', $licenseEndorsement);
    }

    /**
     * Show the form for editing the specified LicenseEndorsement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $licenseEndorsement = $this->licenseEndorsementRepository->find($id);

        if (empty($licenseEndorsement)) {
            Flash::error('License Endorsement not found');

            return redirect(route('licenseEndorsements.index'));
        }
        return view('license_endorsements.edit')->with(['licenseEndorsement' => $licenseEndorsement, 'personalInformation' => $licenseEndorsement->personalInformation]);
    }

    /**
     * Update the specified LicenseEndorsement in storage.
     *
     * @param  int              $id
     * @param UpdateLicenseEndorsementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseEndorsementRequest $request)
    {
        $licenseEndorsement = $this->licenseEndorsementRepository->find($id);

        if (empty($licenseEndorsement)) {
            Flash::error('License Endorsement not found');

            return redirect(route('licenseEndorsements.index'));
        }

        $licenseEndorsement = $this->licenseEndorsementRepository->update($request->all(), $id);

        Flash::success('License Endorsement updated successfully.');


        return redirect(route('licenseEndorsements.create', ['id' => $licenseEndorsement->personal_informations_id]));
    }

    /**
     * Remove the specified LicenseEndorsement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $licenseEndorsement = $this->licenseEndorsementRepository->find($id);
            $personalInformationId = $licenseEndorsement->personal_informations_id;
            $licenseEndorsement->forcedelete();
            Flash::success('License Endorsement deleted successfully.');
        } catch (\Illuminate\Database\QueryException $ex) {
            Flash::error('The License Endorsement can not be deleted. Probably it\'s been used by other entity');
        } finally {
            return redirect(route('licenseEndorsements.create', ['id' => $personalInformationId]));
        }
    }
    public function getPersonalInformationLicense($id)
    {
        $licenseEndorsementModel = $this->licenseEndorsementRepository->model();
        return Datatables::of($licenseEndorsementModel::with(['country', 'licenseEndorsementType', 'licenseEndorsementName'])->where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'license_endorsements.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    }
}
