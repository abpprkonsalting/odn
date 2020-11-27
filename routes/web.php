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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::middleware(['auth'])->group(function () {

    Route::resource('provinces', 'ProvinceController')->middleware('role_or_permission:Admin|province');

    Route::resource('municipalities', 'MunicipalityController')->middleware('role_or_permission:Admin|municipality');

    Route::resource('eyesColors', 'EyesColorController')->middleware('role_or_permission:Admin|eye');

    Route::resource('hairColors', 'HairColorController')->middleware('role_or_permission:Admin|hair');

    Route::resource('skinColors', 'SkinColorController')->middleware('role_or_permission:Admin|skinColors'); 

    Route::resource('maritalStatuses', 'MaritalStatusController')->middleware('role_or_permission:Admin|marital');

    Route::resource('schoolGrades', 'SchoolGradeController')->middleware('role_or_permission:Admin|schoolGrade');

    Route::resource('politicalIntegrations', 'PoliticalIntegrationController')->middleware('role_or_permission:Admin|politicalIntegration');

    Route::resource('ranks', 'RankController')->middleware('role_or_permission:Admin|rank');

    Route::resource('statuses', 'StatusController')->middleware('role_or_permission:Admin|status');

    Route::resource('courseNumbers', 'CourseNumberController')->middleware('role_or_permission:Admin|courseNumber');

    Route::resource('medicalInformations', 'MedicalInformationController')->middleware('role_or_permission:Admin|medicalInformation');

    Route::resource('licenses', 'LicenseController')->middleware('role_or_permission:Admin|license');

    Route::resource('nextOfKins', 'NextOfKinController')->middleware('role_or_permission:Admin|nextOfKin');

    Route::resource('engineTypes', 'EngineTypeController')->middleware('role_or_permission:Admin|engineType');

    Route::resource('flags', 'FlagController')->middleware('role_or_permission:Admin|flag');

    Route::resource('affiliates', 'AffiliateController')->middleware('role_or_permission:Admin|affiliate');

    Route::resource('languages', 'LanguagesController')->middleware('role_or_permission:Admin|languages');

    Route::resource('levels', 'LevelController')->middleware('role_or_permission:Admin|level');

    Route::resource('roles', 'RoleController')->middleware('role_or_permission:Admin|role');

    Route::resource('permissions', 'PermissionsController')->middleware('role_or_permission:Admin|permissions');

    Route::resource('users', 'UserController')->middleware('role_or_permission:Admin|user');

    Route::resource('personalInformations', 'PersonalInformationController')->middleware('role_or_permission:Admin|personalInformation');

    Route::get('province/getAjaxProvinceById/{id}', 'ProvinceController@getAjaxProvinceById');

    Route::resource('operationalInformations', 'OperationalInformationController')->middleware('role_or_permission:Admin|personalInformation');
    
    Route::resource('memos', 'MemoController')->middleware('role_or_permission:Admin|personalInformation');

    Route::get('memos/getPersonalInformationMemo/{id}', 'MemoController@getPersonalInformationMemo')->name("memo.getPersonalInformationMemo");
    
    
    Route::resource('courses', 'CourseController')->middleware('role_or_permission:Admin|personalInformation');
    
    Route::get('courses/getPersonalInformationCourse/{id}', 'CourseController@getPersonalInformationCourse')->name("course.getPersonalInformationCourse");
    
    Route::resource('personalMedicalInformations', 'PersonalMedicalInformationController')->middleware('role_or_permission:Admin|personalInformation');
    
    Route::resource('passports', 'PassportController')->middleware('role_or_permission:Admin|personalInformation');
    
    Route::resource('familyInformations', 'FamilyInformationController')->middleware('role_or_permission:Admin|personalInformation');
    
    Route::resource('otherSkills', 'OtherSkillController')->middleware('role_or_permission:Admin|personalInformation');
    
    Route::resource('companies', 'CompanyController')->middleware('role_or_permission:Admin|personalInformation');
    
    
});