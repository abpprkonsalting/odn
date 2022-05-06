<?php

namespace App\Http\Controllers;

use App\DataTables\VisaDataTable;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateVisaRequest;
use App\Http\Requests\UpdateVisaRequest;
use App\Repositories\VisaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Passport;
use Yajra\DataTables\DataTables;
use App\Repositories\PersonalInformationRepository;
use Response;
use Yajra\DataTables\CollectionDataTable;

class VisaController extends AppBaseController
{
    /** @var  VisaRepository */
    private $visaRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;

    public function __construct(VisaRepository $visaRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->visaRepository = $visaRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the Visa.
     *
     * @param VisaDataTable $visaDataTable
     * @return Response
     */
    public function index(VisaDataTable $visaDataTable)
    {
        return $visaDataTable->render('visas.index');
    }

    /**
     * Show the form for creating a new Visa.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        if (isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if (!empty($personalInformation)) {
                return view('visas.create')->with('personalInformation', $personalInformation);
            }
        }
        Flash::error('Personal Information not found');
        return redirect(route('visas.index'));
    }

    /**
     * Store a newly created Visa in storage.
     *
     * @param CreateVisaRequest $request
     *
     * @return Response
     */
    public function store(CreateVisaRequest $request)
    {
        $input = $request->all();
        $visa = $this->visaRepository->create($input);
        Flash::success('Visa saved successfully.');
        return redirect(route('visas.create', ['id' => $visa->personalInformationId()]));
    }

    /**
     * Display the specified Visa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visa = $this->visaRepository->find($id);
        if (empty($visa)) {
            Flash::error('Visa not found');
            return redirect(route('visas.index'));
        }
        return view('visas.show')->with('visa', $visa);
    }

    /**
     * Show the form for editing the specified Visa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visa = $this->visaRepository->find($id);

        if (empty($visa)) {
            Flash::error('Visa not found');
            return redirect(route('visas.index'));
        }
        $personalInformationModel = $this->personalInformationRepo->model();
        $personalInformation = $personalInformationModel::find($visa->personalInformationId());
        return view('visas.edit')->with(['visa' => $visa, 'personalInformation' => $personalInformation]);
    }

    /**
     * Update the specified Visa in storage.
     *
     * @param  int              $id
     * @param UpdateVisaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisaRequest $request)
    {
        $visa = $this->visaRepository->find($id);

        if (empty($visa)) {
            Flash::error('Visa not found');
            return redirect(route('visas.index'));
        }
        $visa = $this->visaRepository->update($request->all(), $id);
        Flash::success('Visa updated successfully.');
        return redirect(route('visas.create', ['id' => $visa->personalInformationId()]));
    }

    /**
     * Remove the specified Visa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visa = $this->visaRepository->find($id);

        if (empty($visa)) {
            Flash::error('Visa not found');
            return redirect(route('visas.index'));
        }
        $this->visaRepository->find($id)->forcedelete();
        Flash::success('Visa deleted successfully.');
        return redirect(route('visas.create', ['id' => $visa->personalInformationId()]));
    }

    public function getPersonalInformationVisa($id)
    {
        $passports = Passport::where(['personal_informations_id' => $id])->get();
        if ($passports->isEmpty()) {
            $dataTable = new CollectionDataTable(collect([]));
            return $dataTable->make(true);
        }
        $visaModel = $this->visaRepository->model();
        $passportsIds = $passports->map(function($item,$key) {
            return $item->id;
        });
        return Datatables::of($visaModel::with(['visaType','country'])->whereIn('passports_id', [$passportsIds])->get())
            ->addColumn('action', 'visas.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    }
}
