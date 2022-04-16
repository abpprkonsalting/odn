<?php

namespace App\Providers;
use App\Models\Company;

use App\Models\CompanyMission;
use App\Models\CompanyType;
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
use App\Models\SkillOrKnowledge;
use App\Models\Vessel;
use App\Models\VesselType;
use App\Models\Language;
use App\Models\LanguageSkill;
use App\Models\Level;
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
        View::composer(['vessels.fields'], function ($view) {
            $companyItems = Company::pluck('company_name','id')->toArray();
            $vesselTypeItems = VesselType::pluck('title','id')->toArray();
            $engineTypeItems = EngineType::pluck('name','id')->toArray();
            $flagItems = Flag::pluck('name','id')->toArray();
            $view->with(compact('companyItems', 'vesselTypeItems','engineTypeItems','flagItems'));
        });
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
            $companyTypeItems = CompanyType::pluck('title','id')->toArray();
            $companyMissionItems = CompanyMission::pluck('title','id')->toArray();
            $flagItems = Flag::pluck('name','id')->toArray();
            //$engine_typeItems = EngineType::pluck('name','id')->toArray();
            $view->with(compact('flagItems', 'companyTypeItems', 'companyMissionItems'));
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
            $statusesItems = array();
            $statusesItemsAttributes = array();
            $statuses = Status::all()->each(function ($item) use (&$statusesItems,&$statusesItemsAttributes ) {
                $statusesItems[$item->id] = $item->name;
                $statusesItemsAttributes[$item->id] = ['data-onboard' => $item->is_on_board];
            });
            $vesselItems = Vessel::pluck('name','id')->toArray();
            
            $view->with(compact('rankItems', 'statusesItems', 'vesselItems','statusesItemsAttributes'));
        });
        
        View::composer(['personal_medical_informations.fields'], function ($view) {
            $medicalInformationItems = MedicalInformation::pluck('name','id')->toArray();
            
            $view->with(compact('medicalInformationItems'));
        });

        View::composer(['other_skills.fields'], function ($view) {
            $skills_or_knowledgesItems = SkillOrKnowledge::pluck('name','id')->toArray();
            $view->with('skills_or_knowledgesItems', $skills_or_knowledgesItems);
        });

        View::composer(['language_informations.fields'], function ($view) {
            $languageItems = Language::pluck('name','id')->toArray();
            $languageSkillItems = LanguageSkill::pluck('name','id')->toArray();
            $levelItems = Level::pluck('name','id')->toArray();
            $view->with(compact('languageItems','languageSkillItems','levelItems'));
        });
    }
}