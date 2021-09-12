<?php

namespace App\Providers;




use App\Models\VisaType;
use App\Models\LicenseEndorsementName;
use App\Models\Country;
use App\Models\LicenseEndorsementType;
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
use App\Models\FamilyStatus;
use App\Models\Flag;
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
        View::composer(['visas.fields'], function ($view) {
            $visa_typeItems = VisaType::pluck('name','id')->toArray();
            $view->with('visa_typeItems', $visa_typeItems);
        });

        View::composer(['license_endorsements.fields'], function ($view) {
            $license_endorsement_typeItems = LicenseEndorsementType::pluck('name','id')->toArray();
            $countryItems = Country::pluck('name','id')->toArray();

            $view->with(compact('license_endorsement_typeItems', 'countryItems'));
        });

        View::composer(['license_endorsement_names.fields'], function ($view) {
            $license_endorsement_typeItems = LicenseEndorsementType::pluck('name','id')->toArray();
            $view->with('license_endorsement_typeItems', $license_endorsement_typeItems);
        });

        View::composer(['companies.fields'], function ($view) {
            $rankItems = Rank::pluck('name','id')->toArray();
            $flagItems = Flag::pluck('name','id')->toArray();
            $engine_typeItems = EngineType::pluck('name','id')->toArray();
            $view->with(compact('flagItems', 'rankItems', 'engine_typeItems'));
        });

        View::composer(['family_informations.fields'], function ($view) {
            $next_of_kinItems = NextOfKin::pluck('name','id')->toArray();
            $familyStatusItems = FamilyStatus::pluck('name', 'id')->toArray();

            $view->with(compact('familyStatusItems', 'next_of_kinItems'));
        });

        View::composer(['courses.fields', 'family_informations.fields', 'municipalities.fields', 'personal_informations.fields'], function ($view) {
            $provinceItems = Province::pluck('name','id')->toArray();
            
            $view->with('provinceItems', $provinceItems);
        });

        View::composer(['courses.fields'], function ($view) {
            $course_numberItems = CourseNumber::orderBy('sort', 'ASC')->pluck('name','id')->toArray();
            $countryItems = Country::pluck('name','id')->toArray();

            $view->with([
                'course_numberItems' => $course_numberItems,
                'countryItems' => $countryItems,
            ]);
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