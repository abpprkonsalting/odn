<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportExcelFileRequest;
use App\Imports\MunicipalityImport;
use App\Imports\PersonImport;
use App\Imports\ProvinceImport;
use App\Imports\RankImport;
use App\Imports\SchoolGradeImport;
use App\Imports\StatusImport;
use App\Repositories\PersonalInformationRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;

    public function __construct(PersonalInformationRepository $personalInformationRepo)
    {
        $this->personalInformationRepository = $personalInformationRepo;
    }
    
    public function importStatuses() {
        return view('import.import-statuses');
    }

    public function storeStatuses(ImportExcelFileRequest $request) {

        Excel::import(new StatusImport, $request->file('file'));

        Flash::success('Status imported successfully.');

        return redirect(route('import.statuses'));
    }

    public function importRank() {
        return view('import.import-rank');
    }

    public function storeRank(ImportExcelFileRequest $request) {

        Excel::import(new RankImport, $request->file('file'));

        Flash::success('Ranks imported successfully.');

        return redirect(route('import.rank'));
    }

    public function importProvince() {
        return view('import.import-province');
    }

    public function storeProvince(ImportExcelFileRequest $request) {

        Excel::import(new ProvinceImport, $request->file('file'));

        Flash::success('Province imported successfully.');

        return redirect(route('import.province'));
    }

    public function importMunicipality() {
        return view('import.import-municipality');
    }

    public function storeMunicipality(ImportExcelFileRequest $request) {

        Excel::import(new MunicipalityImport, $request->file('file'));

        Flash::success('Municipality imported successfully.');

        return redirect(route('import.municipality'));
    }

    public function importSchoolGrades() {
        return view('import.import-school-grade');
    }

    public function storeSchoolGrades(ImportExcelFileRequest $request) {

        Excel::import(new SchoolGradeImport, $request->file('file'));

        Flash::success('School Grade imported successfully.');

        return redirect(route('import.school.grade'));
    }

    public function importPerson() {
        return view('import.import-person');
    }

    public function storePerson(ImportExcelFileRequest $request) {

        Excel::import(new PersonImport, $request->file('file'));

        Flash::success('Persons imported successfully.');

        return redirect(route('import.person'));
    }

    
}
