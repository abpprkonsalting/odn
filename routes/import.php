<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('import/import-statuses', 'ImportController@importStatuses')->middleware('role_or_permission:Admin')->name('import.statuses');
    Route::post('import/store-statuses', 'ImportController@storeStatuses')->middleware('role_or_permission:Admin')->name('store.statuses');

    Route::get('import/import-rank', 'ImportController@importRank')->middleware('role_or_permission:Admin')->name('import.rank');
    Route::post('import/store-rank', 'ImportController@storeRank')->middleware('role_or_permission:Admin')->name('store.rank');
    
    Route::get('import/import-province', 'ImportController@importProvince')->middleware('role_or_permission:Admin')->name('import.province');
    Route::post('import/store-province', 'ImportController@storeProvince')->middleware('role_or_permission:Admin')->name('store.province');
    
    Route::get('import/import-municipality', 'ImportController@importMunicipality')->middleware('role_or_permission:Admin')->name('import.municipality');
    Route::post('import/store-municipality', 'ImportController@storeMunicipality')->middleware('role_or_permission:Admin')->name('store.municipality');
    
    Route::get('import/import-school-grades', 'ImportController@importSchoolGrades')->middleware('role_or_permission:Admin')->name('import.school.grade');
    Route::post('import/store-school-grades', 'ImportController@storeSchoolGrades')->middleware('role_or_permission:Admin')->name('store.school.grade');
    
    Route::get('import/import-person', 'ImportController@importPerson')->middleware('role_or_permission:Admin')->name('import.person');
    Route::post('import/store-person', 'ImportController@storePerson')->middleware('role_or_permission:Admin')->name('store.person');
    
    Route::get('import/import-course-number', 'ImportController@importCourseNumber')->middleware('role_or_permission:Admin')->name('import.course-number');
    Route::post('import/store-course-number', 'ImportController@storeCourseNumber')->middleware('role_or_permission:Admin')->name('store.course-number');
    
    Route::get('import/import-country', 'ImportController@importCountry')->middleware('role_or_permission:Admin')->name('import.country');
    Route::post('import/store-country', 'ImportController@storeCountry')->middleware('role_or_permission:Admin')->name('store.country');
    
    Route::get('import/import-course', 'ImportController@importCourse')->middleware('role_or_permission:Admin')->name('import.course');
    Route::post('import/store-course', 'ImportController@storeCourse')->middleware('role_or_permission:Admin')->name('store.course');
    
    Route::get('import/import-memo', 'ImportController@importMemo')->middleware('role_or_permission:Admin')->name('import.memo');
    Route::post('import/store-memo', 'ImportController@storeMemo')->middleware('role_or_permission:Admin')->name('store.memo');
    
    Route::get('import/import-passport', 'ImportController@importPassport')->middleware('role_or_permission:Admin')->name('import.passport');
    Route::post('import/store-passport', 'ImportController@storePassport')->middleware('role_or_permission:Admin')->name('store.passport');
    
    Route::get('import/import-seaman-book', 'ImportController@importSeamanBook')->middleware('role_or_permission:Admin')->name('import.seamanBook');
    Route::post('import/store-seaman-book', 'ImportController@storeSeamanBook')->middleware('role_or_permission:Admin')->name('store.seamanBook');
    
    Route::get('import/import-family', 'ImportController@importFamily')->middleware('role_or_permission:Admin')->name('import.family');
    Route::post('import/store-family', 'ImportController@storeFamily')->middleware('role_or_permission:Admin')->name('store.family');
});