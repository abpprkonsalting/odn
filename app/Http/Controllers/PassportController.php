<?php

namespace App\Http\Controllers;

use App\DataTables\PassportDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePassportRequest;
use App\Http\Requests\UpdatePassportRequest;
use App\Repositories\PassportRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Response;

class PassportController extends AppBaseController
{
    /** @var  PassportRepository */
    private $passportRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;

    public function __construct(PassportRepository $passportRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->passportRepository = $passportRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the Passport.
     *
     * @param PassportDataTable $passportDataTable
     * @return Response
     */
    public function index(PassportDataTable $passportDataTable)
    {
        return $passportDataTable->render('passports.index');
    }

    /**
     * Show the form for creating a new Passport.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if (isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if (!empty($personalInformation)) {
                return view('passports.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Personal Information not found');
        return redirect(route('personalInformations.index'));
    }

    /**
     * Store a newly created Passport in storage.
     *
     * @param CreatePassportRequest $request
     *
     * @return Response
     */
    public function store(CreatePassportRequest $request)
    {
        $input = $request->all();

        $passport = $this->passportRepository->create($input);

        Flash::success('Passport saved successfully.');

        return redirect(route('passports.create', ['id' => $passport->personal_informations_id]));
    }

    /**
     * Display the specified Passport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passport = $this->passportRepository->find($id);

        if (empty($passport)) {
            Flash::error('Passport not found');

            return redirect(route('passports.index'));
        }

        return view('passports.show')->with('passport', $passport);
    }

    /**
     * Show the form for editing the specified Passport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $passport = $this->passportRepository->find($id);

        if (empty($passport)) {
            Flash::error('Passport not found');

            return redirect(route('passports.index'));
        }


        return view('passports.edit')->with(['passport' => $passport, 'personalInformation' => $passport->personalInformation]);
    }

    /**
     * Update the specified Passport in storage.
     *
     * @param  int              $id
     * @param UpdatePassportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassportRequest $request)
    {
        $passport = $this->passportRepository->find($id);

        if (empty($passport)) {
            Flash::error('Passport not found');

            return redirect(route('passports.index'));
        }

        $passport = $this->passportRepository->update($request->all(), $id);

        Flash::success('Passport updated successfully.');

        return redirect(route('passports.create', ['id' => $passport->personal_informations_id]));
    }

    /**
     * Remove the specified Passport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $passport = $this->passportRepository->find($id);
            $personalInformationId = $passport->personal_informations_id;
            $passport->forcedelete();
            Flash::success('Passport deleted successfully.');
        } catch (\Illuminate\Database\QueryException $ex) {
            Flash::error('Passport can not be deleted. Probably it\'s been used by other entity');
        } finally {
            return redirect(route('passports.create', ['id' => $personalInformationId]));
        }
    }

    /**
     * Return JSON with listing of the Passport belong to PersonalInformation.
     *
     * @param integer $personal_informations_id
     * @return JSON
     */
    public function getPersonalInformationPassport($id)
    {
        $passportModel = $this->passportRepository->model();
        return Datatables::of($passportModel::with(['country'])->where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'passports.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    }
}
