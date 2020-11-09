<?php

namespace App\Http\Controllers;

use App\DataTables\FlagDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFlagRequest;
use App\Http\Requests\UpdateFlagRequest;
use App\Repositories\FlagRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FlagController extends AppBaseController
{
    /** @var  FlagRepository */
    private $flagRepository;

    public function __construct(FlagRepository $flagRepo)
    {
        $this->flagRepository = $flagRepo;
    }

    /**
     * Display a listing of the Flag.
     *
     * @param FlagDataTable $flagDataTable
     * @return Response
     */
    public function index(FlagDataTable $flagDataTable)
    {
        return $flagDataTable->render('flags.index');
    }

    /**
     * Show the form for creating a new Flag.
     *
     * @return Response
     */
    public function create()
    {
        return view('flags.create');
    }

    /**
     * Store a newly created Flag in storage.
     *
     * @param CreateFlagRequest $request
     *
     * @return Response
     */
    public function store(CreateFlagRequest $request)
    {
        $input = $request->all();

        $flag = $this->flagRepository->create($input);

        Flash::success('Flag saved successfully.');

        return redirect(route('flags.index'));
    }

    /**
     * Display the specified Flag.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $flag = $this->flagRepository->find($id);

        if (empty($flag)) {
            Flash::error('Flag not found');

            return redirect(route('flags.index'));
        }

        return view('flags.show')->with('flag', $flag);
    }

    /**
     * Show the form for editing the specified Flag.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $flag = $this->flagRepository->find($id);

        if (empty($flag)) {
            Flash::error('Flag not found');

            return redirect(route('flags.index'));
        }

        return view('flags.edit')->with('flag', $flag);
    }

    /**
     * Update the specified Flag in storage.
     *
     * @param  int              $id
     * @param UpdateFlagRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFlagRequest $request)
    {
        $flag = $this->flagRepository->find($id);

        if (empty($flag)) {
            Flash::error('Flag not found');

            return redirect(route('flags.index'));
        }

        $flag = $this->flagRepository->update($request->all(), $id);

        Flash::success('Flag updated successfully.');

        return redirect(route('flags.index'));
    }

    /**
     * Remove the specified Flag from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $flag = $this->flagRepository->find($id);

        if (empty($flag)) {
            Flash::error('Flag not found');

            return redirect(route('flags.index'));
        }

        $this->flagRepository->delete($id);

        Flash::success('Flag deleted successfully.');

        return redirect(route('flags.index'));
    }
}
