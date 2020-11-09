<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMedicalInformationAPIRequest;
use App\Http\Requests\API\UpdateMedicalInformationAPIRequest;
use App\Models\MedicalInformation;
use App\Repositories\MedicalInformationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MedicalInformationController
 * @package App\Http\Controllers\API
 */

class MedicalInformationAPIController extends AppBaseController
{
    /** @var  MedicalInformationRepository */
    private $medicalInformationRepository;

    public function __construct(MedicalInformationRepository $medicalInformationRepo)
    {
        $this->medicalInformationRepository = $medicalInformationRepo;
    }

    /**
     * Display a listing of the MedicalInformation.
     * GET|HEAD /medicalInformations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $medicalInformations = $this->medicalInformationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($medicalInformations->toArray(), 'Medical Informations retrieved successfully');
    }

    /**
     * Store a newly created MedicalInformation in storage.
     * POST /medicalInformations
     *
     * @param CreateMedicalInformationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicalInformationAPIRequest $request)
    {
        $input = $request->all();

        $medicalInformation = $this->medicalInformationRepository->create($input);

        return $this->sendResponse($medicalInformation->toArray(), 'Medical Information saved successfully');
    }

    /**
     * Display the specified MedicalInformation.
     * GET|HEAD /medicalInformations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MedicalInformation $medicalInformation */
        $medicalInformation = $this->medicalInformationRepository->find($id);

        if (empty($medicalInformation)) {
            return $this->sendError('Medical Information not found');
        }

        return $this->sendResponse($medicalInformation->toArray(), 'Medical Information retrieved successfully');
    }

    /**
     * Update the specified MedicalInformation in storage.
     * PUT/PATCH /medicalInformations/{id}
     *
     * @param int $id
     * @param UpdateMedicalInformationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicalInformationAPIRequest $request)
    {
        $input = $request->all();

        /** @var MedicalInformation $medicalInformation */
        $medicalInformation = $this->medicalInformationRepository->find($id);

        if (empty($medicalInformation)) {
            return $this->sendError('Medical Information not found');
        }

        $medicalInformation = $this->medicalInformationRepository->update($input, $id);

        return $this->sendResponse($medicalInformation->toArray(), 'MedicalInformation updated successfully');
    }

    /**
     * Remove the specified MedicalInformation from storage.
     * DELETE /medicalInformations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MedicalInformation $medicalInformation */
        $medicalInformation = $this->medicalInformationRepository->find($id);

        if (empty($medicalInformation)) {
            return $this->sendError('Medical Information not found');
        }

        $medicalInformation->delete();

        return $this->sendSuccess('Medical Information deleted successfully');
    }
}
