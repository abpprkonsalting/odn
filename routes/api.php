<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('provinces', 'ProvinceAPIController');

Route::resource('municipalities', 'MunicipalityAPIController');

Route::resource('eyes_colors', 'EyesColorAPIController');

Route::resource('hair_colors', 'HairColorAPIController');

Route::resource('marital_statuses', 'MaritalStatusAPIController');

Route::resource('school_grades', 'SchoolGradeAPIController');

Route::resource('political_integrations', 'PoliticalIntegrationAPIController');

Route::resource('ranks', 'RankAPIController');

Route::resource('statuses', 'StatusAPIController');

Route::resource('course_numbers', 'CourseNumberAPIController');

Route::resource('medical_informations', 'MedicalInformationAPIController');

Route::resource('licenses', 'LicenseAPIController');

Route::resource('next_of_kins', 'NextOfKinAPIController');

Route::resource('engine_types', 'EngineTypeAPIController');

Route::resource('flags', 'FlagAPIController');

Route::resource('affiliates', 'AffiliateAPIController');

Route::resource('languages', 'LanguagesAPIController');

Route::resource('levels', 'LevelAPIController');

Route::resource('personal_informations', 'PersonalInformationAPIController');*/

Route::resource('operational_informations', 'OperationalInformationAPIController');

Route::resource('memos', 'MemoAPIController');

Route::resource('courses', 'CourseAPIController');

Route::resource('personal_medical_informations', 'PersonalMedicalInformationAPIController');

Route::resource('passports', 'PassportAPIController');

Route::resource('family_informations', 'FamilyInformationAPIController');

Route::resource('other_skills', 'OtherSkillAPIController');

Route::resource('companies', 'CompanyAPIController');