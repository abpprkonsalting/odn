<?php

namespace App\Http\Controllers;

use App\DataTables\EyesColorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEyesColorRequest;
use App\Http\Requests\UpdateEyesColorRequest;
use App\Repositories\EyesColorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EyesColorController extends AppBaseController
{
    /** @var  EyesColorRepository */
    private $eyesColorRepository;

    public function __construct(EyesColorRepository $eyesColorRepo)
    {
        $this->eyesColorRepository = $eyesColorRepo;
    }

    /**
     * Display a listing of the EyesColor.
     *
     * @param EyesColorDataTable $eyesColorDataTable
     * @return Response
     */
    public function index(EyesColorDataTable $eyesColorDataTable)
    {
        return $eyesColorDataTable->render('eyes_colors.index');
    }

    /**
     * Show the form for creating a new EyesColor.
     *
     * @return Response
     */
    public function create()
    {
        return view('eyes_colors.create');
    }

    /**
     * Store a newly created EyesColor in storage.
     *
     * @param CreateEyesColorRequest $request
     *
     * @return Response
     */
    public function store(CreateEyesColorRequest $request)
    {
        $input = $request->all();

        $eyesColor = $this->eyesColorRepository->create($input);

        Flash::success('Eyes Color saved successfully.');

        return redirect(route('eyesColors.index'));
    }

    /**
     * Display the specified EyesColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eyesColor = $this->eyesColorRepository->find($id);

        if (empty($eyesColor)) {
            Flash::error('Eyes Color not found');

            return redirect(route('eyesColors.index'));
        }

        return view('eyes_colors.show')->with('eyesColor', $eyesColor);
    }

    /**
     * Show the form for editing the specified EyesColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eyesColor = $this->eyesColorRepository->find($id);

        if (empty($eyesColor)) {
            Flash::error('Eyes Color not found');

            return redirect(route('eyesColors.index'));
        }

        return view('eyes_colors.edit')->with('eyesColor', $eyesColor);
    }

    /**
     * Update the specified EyesColor in storage.
     *
     * @param  int              $id
     * @param UpdateEyesColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEyesColorRequest $request)
    {
        $eyesColor = $this->eyesColorRepository->find($id);

        if (empty($eyesColor)) {
            Flash::error('Eyes Color not found');

            return redirect(route('eyesColors.index'));
        }

        $eyesColor = $this->eyesColorRepository->update($request->all(), $id);

        Flash::success('Eyes Color updated successfully.');

        return redirect(route('eyesColors.index'));
    }

    /**
     * Remove the specified EyesColor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eyesColor = $this->eyesColorRepository->find($id);

        if (empty($eyesColor)) {
            Flash::error('Eyes Color not found');

            return redirect(route('eyesColors.index'));
        }

        $this->eyesColorRepository->delete($id);

        Flash::success('Eyes Color deleted successfully.');

        return redirect(route('eyesColors.index'));
    }
}
