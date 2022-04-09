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

    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'languageInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('languageInformations.create', ['id' => $personalInformationId]) : null }}">Languages Information</a>
    </li>
    
<li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'licenseEndorsement' ? 'active' : null  }}">
    <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('licenseEndorsements.create', ['id' => $personalInformationId]) : null }}">License & Endorsement</a>
</li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'familyInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('familyInformations.create', ['id' => $personalInformationId]) : null }}">Family Information</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'otherSkills' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('otherSkills.create', ['id' => $personalInformationId]) : null }}">Other Skills</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'companiesInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('companies.create', ['id' => $personalInformationId]) : null }}">Company</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'seamanBooks' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('seamanBooks.create', ['id' => $personalInformationId]) : null }}">Seaman Book</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'visasInformation' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('visas.create', ['id' => $personalInformationId]) : null }}">Visa</a>
    </li>
    <li class="{{ isset($activeMenuTemplate) && $activeMenuTemplate == 'shoreExperiencies' ? 'active' : null  }}">
        <a href="{{ isset($personalInformationId) && !empty($personalInformationId) ? route('shoreExperiencies.create', ['id' => $personalInformationId]) : null }}">Shore Experiencies</a>
    </li>
</ul>