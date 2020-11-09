<?php

namespace App\Http\Controllers;

use App\DataTables\NextOfKinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNextOfKinRequest;
use App\Http\Requests\UpdateNextOfKinRequest;
use App\Repositories\NextOfKinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NextOfKinController extends AppBaseController
{
    /** @var  NextOfKinRepository */
    private $nextOfKinRepository;

    public function __construct(NextOfKinRepository $nextOfKinRepo)
    {
        $this->nextOfKinRepository = $nextOfKinRepo;
    }

    /**
     * Display a listing of the NextOfKin.
     *
     * @param NextOfKinDataTable $nextOfKinDataTable
     * @return Response
     */
    public function index(NextOfKinDataTable $nextOfKinDataTable)
    {
        return $nextOfKinDataTable->render('next_of_kins.index');
    }

    /**
     * Show the form for creating a new NextOfKin.
     *
     * @return Response
     */
    public function create()
    {
        return view('next_of_kins.create');
    }

    /**
     * Store a newly created NextOfKin in storage.
     *
     * @param CreateNextOfKinRequest $request
     *
     * @return Response
     */
    public function store(CreateNextOfKinRequest $request)
    {
        $input = $request->all();

        $nextOfKin = $this->nextOfKinRepository->create($input);

        Flash::success('Next Of Kin saved successfully.');

        return redirect(route('nextOfKins.index'));
    }

    /**
     * Display the specified NextOfKin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nextOfKin = $this->nextOfKinRepository->find($id);

        if (empty($nextOfKin)) {
            Flash::error('Next Of Kin not found');

            return redirect(route('nextOfKins.index'));
        }

        return view('next_of_kins.show')->with('nextOfKin', $nextOfKin);
    }

    /**
     * Show the form for editing the specified NextOfKin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nextOfKin = $this->nextOfKinRepository->find($id);

        if (empty($nextOfKin)) {
            Flash::error('Next Of Kin not found');

            return redirect(route('nextOfKins.index'));
        }

        return view('next_of_kins.edit')->with('nextOfKin', $nextOfKin);
    }

    /**
     * Update the specified NextOfKin in storage.
     *
     * @param  int              $id
     * @param UpdateNextOfKinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNextOfKinRequest $request)
    {
        $nextOfKin = $this->nextOfKinRepository->find($id);

        if (empty($nextOfKin)) {
            Flash::error('Next Of Kin not found');

            return redirect(route('nextOfKins.index'));
        }

        $nextOfKin = $this->nextOfKinRepository->update($request->all(), $id);

        Flash::success('Next Of Kin updated successfully.');

        return redirect(route('nextOfKins.index'));
    }

    /**
     * Remove the specified NextOfKin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nextOfKin = $this->nextOfKinRepository->find($id);

        if (empty($nextOfKin)) {
            Flash::error('Next Of Kin not found');

            return redirect(route('nextOfKins.index'));
        }

        $this->nextOfKinRepository->delete($id);

        Flash::success('Next Of Kin deleted successfully.');

        return redirect(route('nextOfKins.index'));
    }
}
