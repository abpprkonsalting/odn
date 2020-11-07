<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('provinces', 'ProvinceController');

Route::resource('municipalities', 'MunicipalityController');

Route::resource('eyesColors', 'EyesColorController');

Route::resource('hairColors', 'HairColorController');

Route::resource('maritalStatuses', 'MaritalStatusController');

Route::resource('schoolGrades', 'SchoolGradeController');

Route::resource('politicalIntegrations', 'PoliticalIntegrationController');

Route::resource('ranks', 'RankController');

Route::resource('statuses', 'StatusController');

Route::resource('courseNumbers', 'CourseNumberController');

Route::resource('medicalInformations', 'MedicalInformationController');

Route::resource('licenses', 'LicenseController');

Route::resource('nextOfKins', 'NextOfKinController');

Route::resource('engineTypes', 'EngineTypeController');

Route::resource('flags', 'FlagController');

Route::resource('affiliates', 'AffiliateController');

Route::resource('languages', 'LanguagesController');

Route::resource('levels', 'LevelController');