<?php

namespace App\Http\Controllers;

use App\DataTables\HairColorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHairColorRequest;
use App\Http\Requests\UpdateHairColorRequest;
use App\Repositories\HairColorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HairColorController extends AppBaseController
{
    /** @var  HairColorRepository */
    private $hairColorRepository;

    public function __construct(HairColorRepository $hairColorRepo)
    {
        $this->hairColorRepository = $hairColorRepo;
    }

    /**
     * Display a listing of the HairColor.
     *
     * @param HairColorDataTable $hairColorDataTable
     * @return Response
     */
    public function index(HairColorDataTable $hairColorDataTable)
    {
        return $hairColorDataTable->render('hair_colors.index');
    }

    /**
     * Show the form for creating a new HairColor.
     *
     * @return Response
     */
    public function create()
    {
        return view('hair_colors.create');
    }

    /**
     * Store a newly created HairColor in storage.
     *
     * @param CreateHairColorRequest $request
     *
     * @return Response
     */
    public function store(CreateHairColorRequest $request)
    {
        $input = $request->all();

        $hairColor = $this->hairColorRepository->create($input);

        Flash::success('Hair Color saved successfully.');

        return redirect(route('hairColors.index'));
    }

    /**
     * Display the specified HairColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hairColor = $this->hairColorRepository->find($id);

        if (empty($hairColor)) {
            Flash::error('Hair Color not found');

            return redirect(route('hairColors.index'));
        }

        return view('hair_colors.show')->with('hairColor', $hairColor);
    }

    /**
     * Show the form for editing the specified HairColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hairColor = $this->hairColorRepository->find($id);

        if (empty($hairColor)) {
            Flash::error('Hair Color not found');

            return redirect(route('hairColors.index'));
        }

        return view('hair_colors.edit')->with('hairColor', $hairColor);
    }

    /**
     * Update the specified HairColor in storage.
     *
     * @param  int              $id
     * @param UpdateHairColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHairColorRequest $request)
    {
        $hairColor = $this->hairColorRepository->find($id);

        if (empty($hairColor)) {
            Flash::error('Hair Color not found');

            return redirect(route('hairColors.index'));
        }

        $hairColor = $this->hairColorRepository->update($request->all(), $id);

        Flash::success('Hair Color updated successfully.');

        return redirect(route('hairColors.index'));
    }

    /**
     * Remove the specified HairColor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hairColor = $this->hairColorRepository->find($id);

        if (empty($hairColor)) {
            Flash::error('Hair Color not found');

            return redirect(route('hairColors.index'));
        }

        $this->hairColorRepository->delete($id);

        Flash::success('Hair Color deleted successfully.');

        return redirect(route('hairColors.index'));
    }
}
