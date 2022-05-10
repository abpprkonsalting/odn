<?php

namespace App\Http\Controllers;

use App\DataTables\SkinColorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSkinColorRequest;
use App\Http\Requests\UpdateSkinColorRequest;
use App\Repositories\SkinColorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SkinColorController extends AppBaseController
{
    /** @var  SkinColorRepository */
    private $skinColorRepository;

    public function __construct(SkinColorRepository $skinColorRepo)
    {
        $this->skinColorRepository = $skinColorRepo;
    }

    /**
     * Display a listing of the SkinColor.
     *
     * @param SkinColorDataTable $skinColorDataTable
     * @return Response
     */
    public function index(SkinColorDataTable $skinColorDataTable)
    {
        return $skinColorDataTable->render('skin_colors.index');
    }

    /**
     * Show the form for creating a new SkinColor.
     *
     * @return Response
     */
    public function create()
    {
        return view('skin_colors.create');
    }

    /**
     * Store a newly created SkinColor in storage.
     *
     * @param CreateSkinColorRequest $request
     *
     * @return Response
     */
    public function store(CreateSkinColorRequest $request)
    {
        $input = $request->all();

        $skinColor = $this->skinColorRepository->create($input);

        Flash::success('Skin Color saved successfully.');

        return redirect(route('skinColors.index'));
    }

    /**
     * Display the specified SkinColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $skinColor = $this->skinColorRepository->find($id);

        if (empty($skinColor)) {
            Flash::error('Skin Color not found');

            return redirect(route('skinColors.index'));
        }

        return view('skin_colors.show')->with('skinColor', $skinColor);
    }

    /**
     * Show the form for editing the specified SkinColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $skinColor = $this->skinColorRepository->find($id);

        if (empty($skinColor)) {
            Flash::error('Skin Color not found');

            return redirect(route('skinColors.index'));
        }

        return view('skin_colors.edit')->with('skinColor', $skinColor);
    }

    /**
     * Update the specified SkinColor in storage.
     *
     * @param  int              $id
     * @param UpdateSkinColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkinColorRequest $request)
    {
        $skinColor = $this->skinColorRepository->find($id);

        if (empty($skinColor)) {
            Flash::error('Skin Color not found');

            return redirect(route('skinColors.index'));
        }

        $skinColor = $this->skinColorRepository->update($request->all(), $id);

        Flash::success('Skin Color updated successfully.');

        return redirect(route('skinColors.index'));
    }

    /**
     * Remove the specified SkinColor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
       
        try{
            
            $this->skinColorRepository->find($id)->forcedelete();

            Flash::success('Skin Color deleted successfully.');
    

    
 
             }
         catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::error('The Skin Color can not be deleted. Probably it\'s been used by other entity');
            
             }
        finally{
            return redirect(route('skinColors.index'));

        }     


       
        
    }
}
