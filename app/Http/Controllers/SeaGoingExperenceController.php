<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\VesselDataTable;
use App\Http\Requests\CreateSeaGoingExperienceRequest;
use App\Http\Requests\UpdateSeaGoingExperienceRequest;
use App\Repositories\SeaGoingExperienceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SeaGoingExperienceController extends AppBaseController
{
    /** @var  SeaGoingExperienceRepository */
    private $seaGoingExperienceRepository;

    public function __construct(SeaGoingExperienceRepository $seaGoingExperienceRepo)
    {
        $this->seaGoingExperienceRepository = $seaGoingExperienceRepo;
    }   
      
    
    /**
     * Display a listing of the SeaGoingExperience.
     *
     * * @param SeaGoingExperienceDataTable $seaGoingExperienceDataTable
     * @return Response
     */
    public function index(SeaGoingExperienceDataTable $seaGoingExperienceDataTable)
    {
        return $seaGoingExperienceDataTable->render('sea_going_experiences.index');
    }

    /**
     * Show the form for creating a new SeaGoingExperience.
     *
     * @return Response
     */
    public function create()
    {
        return view('sea_going_experiences.create');
    }

    /**
     * Store a newly created SeaGoingExperience in storage.
     *
     * @param  CreateSeaGoingExperienceRequest $request
     * @return Response
     */
    public function store(CreateSeaGoingExperienceRequest $request)
    {
        $input = $request->all();

        $seaGoingExperience = $this->seaGoingExperienceRepository->create($input);

        Flash::success('SeaGoingExperience saved successfully.');

        return redirect(route('sea_going_experiences.index'));
    }

    /**
     * Display the specified SeaGoingExperience.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);

        if (empty($seaGoingExperience)) {
            Flash::error('SeaGoingExperience not found');

            return redirect(route('sea_going_experiences.index'));
        }

        return view('sea_going_experiences.show')->with('seaGoingExperience', $seaGoingExperience);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);

        if (empty($seaGoingExperience)) {
            Flash::error('SeaGoingExperience  not found');

            return redirect(route('sea_going_experiences.index'));
        }

        return view('sea_going_experiences.edit')->with('seaGoingExperience', $seaGoingExperience);

    }

    /**
     * Update the specified resource in storage.
     *     
     * @param  int  $id
     * @return Response
     * @param UpdateSeaGoingExperienceRequest $request
     */
    public function update(UpdateSeaGoingExperienceRequest $request, $id)
    {
        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);

        if (empty($seaGoingExperience)) {
            Flash::error('SeaGoingExperience not found');

            return redirect(route('sea_going_experiences.index'));
        }

        $seaGoingExperience = $this->seaGoingExperienceRepository->update($request->all(), $id);

        Flash::success('SeaGoingExperience updated successfully.');

        return redirect(route('sea_going_experiences.index'));
    }

    /**
     * Remove the specified SeaGoingExperience from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $seaGoingExperience = $this->seaGoingExperienceRepository->find($id);

        if (empty($seaGoingExperience)) {
            Flash::error('SeaGoingExperience not found');

            return redirect(route('sea_going_experiences.index'));
        }

        $seaGoingExperience = $this->seaGoingExperienceRepository->delete($id);

        Flash::success('SeaGoingExperience Delete successfully.');

        return redirect(route('sea_going_experiences.index'));
    }
}
