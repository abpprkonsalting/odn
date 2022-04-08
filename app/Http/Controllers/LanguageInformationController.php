<?php

namespace App\Http\Controllers;

use App\DataTables\LanguageInformationDataTable;
use App\Http\Requests\CreateLanguageInformationRequest;
use App\Http\Requests\UpdateLanguageInformationRequest;
use App\Repositories\LanguageInformationRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;
class LanguageInformationController extends Controller
{
    /** @var  LanguageInformationRepository */
    private $languageInformationRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;


    public function __construct(LanguageInformationRepository $courseRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->languageInformationRepository = $languageInformationRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

     /**
     * Display a listing of the Course.
     *
     * @param LanguageInformationDataTable $courseDataTable
     * @return Response
     */

    public function index()
    {
        return $languageInformationDataTable->render('language_informations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('language_Informations.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  @param CreateLanguegeInformationRequest $request
     * @return Response
     */
    public function store(CreateLanguegeInformationRequest  $request)
    {
        $input = $request->all();

        $LanguageInformation = $this->languageInformationRepository->create($input);

        Flash::success('Language Information saved successfully.');

        return redirect(route('languageInformations.index'));
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $languageInformation = $this->laguageInformationRepository->find($id);

        if (empty($languagueInformation)) {
            Flash::error('Language Information not found');

            return redirect(route('languageInformations.index'));
        }

        return view('language_informations.show')->with('languageInformation', $languageInformation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $languageInformation = $this->laguageInformationRepository->find($id);

        if (empty($languagueInformation)) {
            Flash::error('Language Information not found');

            return redirect(route('languageInformations.index'));
        }

        return view('language_informations.edit')->with('languageInformation', $languageInformation);
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLanguageInformationRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateLanguageInformationRequest $request, $id)
    {
        $languageInformation = $this->laguageInformationRepository->find($id);

        if (empty($languagueInformation)) {
            Flash::error('Language Information not found');

            return redirect(route('languageInformations.index'));
        }

        $languageInformation = $this->languageInformationRepository->update($request->all(), $id);

        Flash::success('Language Information updated successfully.');

        return redirect(route('languageInformations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $languageInformation = $this->laguageInformationRepository->find($id);

        if (empty($languagueInformation)) {
            Flash::error('Language Information not found');

            return redirect(route('languageInformations.index'));
        }

        $this->languageInformationRepository->delete($id);

        Flash::success('Language Information deleted successfully.');

        return redirect(route('languageInformations.index'));
    }
}
