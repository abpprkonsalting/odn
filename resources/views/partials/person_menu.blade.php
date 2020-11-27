<ul class="nav nav-pills nav-stacked">
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'personalInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('personalInformations.edit', $personalInformationId) : null }}">Personal Information</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'operationalInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('operationalInformations.edit', $personalInformationId) : null }}">Operational Information</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'memosInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('memos.create', ['id' => $personalInformationId]) : null }}">Memo</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'coursesInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('courses.create', ['id' => $personalInformationId]) : null }}">Courses</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'personalMedicalInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('personalMedicalInformations.create', ['id' => $personalInformationId]) : null }}">Medical Information</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'passportsInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('passports.create', ['id' => $personalInformationId]) : null }}">Passport</a>
    </li>
    <li><a href="#">License & Endorsement</a></li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'familyInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('familyInformations.create', ['id' => $personalInformationId]) : null }}">Family Information</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'otherSkills' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('otherSkills.create', ['id' => $personalInformationId]) : null }}">Other Skills</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'companies' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('companies.create', ['id' => $personalInformationId]) : null }}">Company</a>
    </li>
    <li><a href="#">Seaman Book</a></li>
</ul>