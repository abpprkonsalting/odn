<?php

namespace App\Providers;
use App\Models\EngineType;
use App\Models\Municipality;
use App\Models\NextOfKin;
use App\Models\CourseNumber;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\ServiceProvider;
use App\Models\Province;
use App\Models\PoliticalIntegration;
use App\Models\EyesColor;
use App\Models\HairColor;
use App\Models\MaritalStatus;
use App\Models\MedicalInformation;
use App\Models\Rank;
use App\Models\SchoolGrade;
use App\Models\SkinColor;
use App\Models\Status;
use Spatie\Permission\Models\Role;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['companies.fields'], function ($view) {
            $rankItems = Rank::pluck('name','id')->toArray();
            $view->with('rankItems', $rankItems);
        });
        View::composer(['companies.fields'], function ($view) {
            $rankItems = Rank::pluck('name','id')->toArray();
            $view->with('rankItems', $rankItems);
        });
        View::composer(['companies.fields'], function ($view) {
            $engine_typeItems = EngineType::pluck('name','id')->toArray();
            $view->with('engine_typeItems', $engine_typeItems);
        });
        View::composer(['family_informations.fields'], function ($view) {
            $municipalityItems = Municipality::pluck('name','id')->toArray();
            $view->with('municipalityItems', $municipalityItems);
        });
        View::composer(['family_informations.fields'], function ($view) {
            $provinceItems = Province::pluck('name','id')->toArray();
            $view->with('provinceItems', $provinceItems);
        });
        View::composer(['family_informations.fields'], function ($view) {
            $next_of_kinItems = NextOfKin::pluck('name','id')->toArray();
            $view->with('next_of_kinItems', $next_of_kinItems);
        });
        View::composer(['courses.fields'], function ($view) {
            $provinceItems = Province::pluck('name','id')->toArray();
            $view->with('provinceItems', $provinceItems);
        });
        View::composer(['courses.fields'], function ($view) {
            $course_numberItems = CourseNumber::pluck('name','id')->toArray();
            $view->with('course_numberItems', $course_numberItems);
        });
        View::composer(['municipalities.fields', 'personal_informations.fields'], function ($view) {
            $provinceItems = Province::pluck('name','id')->toArray();
            $view->with('provinceItems', $provinceItems);
        });

        View::composer(['roles.fields', 'users.fields'], function ($view) {
            $permissionItems = Permission::pluck('name','id')->toArray();
            $view->with('permissionItems', $permissionItems);
        });

        View::composer(['permissions.fields', 'users.fields'], function ($view) {
            $rolesItems = Role::pluck('name','id')->toArray();
            $view->with('rolesItems', $rolesItems);
        });

        View::composer(['personal_informations.fields'], function ($view) {
            $politicalIntegrationItems = PoliticalIntegration::pluck('name','id')->toArray();
            $politicalIntegrationItems = PoliticalIntegration::pluck('name','id')->toArray();
            $hairColorIdItems = HairColor::pluck('name','id')->toArray();
            $eyesColorIdItems = EyesColor::pluck('name','id')->toArray();
            $schoolGradeIdItems = SchoolGrade::pluck('name','id')->toArray();
            $maritalStatusIdItems = MaritalStatus::pluck('name','id')->toArray();
            $skinColorIdItems = SkinColor::pluck('name','id')->toArray();

            $view->with(compact('politicalIntegrationItems', 'eyesColorIdItems', 'hairColorIdItems', 'maritalStatusIdItems', 'schoolGradeIdItems', 'skinColorIdItems'));
        });
        //

        View::composer(['operational_informations.fields'], function ($view) {
            $rankItems = Rank::pluck('name','id')->toArray();
            $statusesItems = Status::pluck('name','id')->toArray();
            
            $view->with(compact('rankItems', 'statusesItems'));
        });
        
        View::composer(['personal_medical_informations.fields'], function ($view) {
            $medicalInformationItems = MedicalInformation::pluck('name','id')->toArray();
            
            $view->with(compact('medicalInformationItems'));
        });
    }
}