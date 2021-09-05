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
});