<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePassportAPIRequest;
use App\Http\Requests\API\UpdatePassportAPIRequest;
use App\Models\Passport;
use App\Repositories\PassportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PassportController
 * @package App\Http\Controllers\API
 */

class PassportAPIController extends AppBaseController
{
    /** @var  PassportRepository */
    private $passportRepository;

    public function __construct(PassportRepository $passportRepo)
    {
        $this->passportRepository = $passportRepo;
    }

    /**
     * Display a listing of the Passport.
     * GET|HEAD /passports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $passports = $this->passportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($passports->toArray(), 'Passports retrieved successfully');
    }

    /**
     * Store a newly created Passport in storage.
     * POST /passports
     *
     * @param CreatePassportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePassportAPIRequest $request)
    {
        $input = $request->all();

        $passport = $this->passportRepository->create($input);

        return $this->sendResponse($passport->toArray(), 'Passport saved successfully');
    }

    /**
     * Display the specified Passport.
     * GET|HEAD /passports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Passport $passport */
        $passport = $this->passportRepository->find($id);

        if (empty($passport)) {
            return $this->sendError('Passport not found');
        }

        return $this->sendResponse($passport->toArray(), 'Passport retrieved successfully');
    }

    /**
     * Update the specified Passport in storage.
     * PUT/PATCH /passports/{id}
     *
     * @param int $id
     * @param UpdatePassportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassportAPIRequest $request)
    {
        $input = $request->all();

        /** @var Passport $passport */
        $passport = $this->passportRepository->find($id);

        if (empty($passport)) {
            return $this->sendError('Passport not found');
        }

        $passport = $this->passportRepository->update($input, $id);

        return $this->sendResponse($passport->toArray(), 'Passport updated successfully');
    }

    /**
     * Remove the specified Passport from storage.
     * DELETE /passports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Passport $passport */
        $passport = $this->passportRepository->find($id);

        if (empty($passport)) {
            return $this->sendError('Passport not found');
        }

        $passport->delete();

        return $this->sendSuccess('Passport deleted successfully');
    }
}
