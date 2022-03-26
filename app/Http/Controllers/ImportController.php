<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportExcelFileRequest;
use App\Imports\CompanyImport;
use App\Imports\CountryImport;
use App\Imports\CourseImport;
use App\Imports\CourseNumberImport;
use App\Imports\FamilyImport;
use App\Imports\MedicalInformationImport;
use App\Imports\MemoImport;
use App\Imports\SeaGoingExperienceImport;
use App\Imports\MunicipalityImport;
use App\Imports\OtherSkillsImport;
use App\Imports\PassportImport;
use App\Imports\PersonImport;
use App\Imports\ProvinceImport;
use App\Imports\RankImport;
use App\Imports\SchoolGradeImport;
use App\Imports\SeamanBook;
use App\Imports\SeamanBookImport;
use App\Imports\SkillOrKnowledgesImport;
use App\Imports\StatusImport;
use App\Imports\VesselImport;
use App\Imports\VesselTypeImport;
use App\Imports\FlagsImport;
use App\Models\CourseNumber;
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

    public function importCourseNumber() {
        return view('import.import-course-number');
    }

    public function storeCourseNumber(ImportExcelFileRequest $request) {

        Excel::import(new CourseNumberImport, $request->file('file'));

        Flash::success('Courses imported successfully.');

        return redirect(route('import.course-number'));
    }

    public function importCountry() {
        return view('import.import-country');
    }

    public function storeCountry(ImportExcelFileRequest $request) {

        Excel::import(new CountryImport, $request->file('file'));

        Flash::success('Country imported successfully.');

        return redirect(route('import.country'));
    }

    public function importCourse() {
        return view('import.import-course');
    }

    public function storeCourse(ImportExcelFileRequest $request) {

        Excel::import(new CourseImport, $request->file('file'));

        Flash::success('Courses imported successfully.');

        return redirect(route('import.course'));
    }

    public function importMemo() {
        return view('import.import-memo');
    }

    public function storeMemo(ImportExcelFileRequest $request) {

        Excel::import(new MemoImport, $request->file('file'));

        Flash::success('Memo imported successfully.');

        return redirect(route('import.memo'));
    }

    public function importPassport() {
        return view('import.import-passport');
    }

    public function storePassport(ImportExcelFileRequest $request) {

        Excel::import(new PassportImport, $request->file('file'));

        Flash::success('Passport imported successfully.');

        return redirect(route('import.passport'));
    }

    public function importSeamanBook() {
        return view('import.import-seaman-book');
    }

    public function storeSeamanBook(ImportExcelFileRequest $request) {

        Excel::import(new SeamanBookImport, $request->file('file'));

        Flash::success('Seaman Book imported successfully.');

        return redirect(route('import.seamanBook'));
    }

    public function importFamily() {
        return view('import.import-family');
    }

    public function storeFamily(ImportExcelFileRequest $request) {

        Excel::import(new FamilyImport, $request->file('file'));

        Flash::success('Family imported successfully.');

        return redirect(route('import.family'));
    }

    public function importMedicalInformation() {
        return view('import.import-medical-information');
    }

    public function storeMedicalInformation(ImportExcelFileRequest $request) {

        Excel::import(new MedicalInformationImport, $request->file('file'));

        Flash::success('Medical Information imported successfully.');

        return redirect(route('import.medical-information'));
    }

    public function importSkillOrKnowledge() {
        return view('import.import-skill-or-knowledge');
    }

    public function storeSkillOrKnowledge(ImportExcelFileRequest $request) {

        Excel::import(new SkillOrKnowledgesImport, $request->file('file'));

        Flash::success('Skill or Knowledges Information imported successfully.');

        return redirect(route('import.skill-or-knowledge'));
    }

    public function importOtherSkills() {
        return view('import.import-other-skills');
    }

    public function storeOtherSkills(ImportExcelFileRequest $request) {

        Excel::import(new OtherSkillsImport, $request->file('file'));

        Flash::success('Other Skills Information imported successfully.');

        return redirect(route('import.other-skills'));
    }

    public function importCompany() {
        return view('import.import-company');
    }

    public function storeCompany(ImportExcelFileRequest $request) {

        Excel::import(new CompanyImport, $request->file('file'));

        Flash::success('Company Information imported successfully.');

        return redirect(route('import.company'));
    }

    public function importVessel() {
        return view('import.import-vessel');
    }

    public function storeVessel(ImportExcelFileRequest $request) {

        Excel::import(new VesselImport, $request->file('file'));

        Flash::success('Vessels Information imported successfully.');

        return redirect(route('import.vessel'));
    }

    public function importFlag() {
        return view('import.import-flag');
    }

    public function storeFlag(ImportExcelFileRequest $request) {

        Excel::import(new FlagsImport, $request->file('file'));

        Flash::success('Flags imported successfully.');

        return redirect(route('import.flag'));
    }

    public function importVesselType() {
        return view('import.import-vessel-type');
    }

    public function storeVesselType(ImportExcelFileRequest $request) {

        Excel::import(new VesselTypeImport, $request->file('file'));

        Flash::success('VesselType imported successfully.');

        return redirect(route('import.vessel-type'));
    }

    public function importSeaGoingExperience() {
        return view('import.import-sea-going-experience');
    }

    public function storeSeaGoingExperience(ImportExcelFileRequest $request) {

        Excel::import(new SeaGoingExperienceImport, $request->file('file'));

        Flash::success('SeaGoinExperience Information imported successfully.');

        return redirect(route('import.sea-going-experience'));
    }
    
}
