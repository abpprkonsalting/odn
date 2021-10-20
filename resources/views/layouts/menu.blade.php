<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{ route('home') }}">
        <i class="fa fa-dashboard"></i> 
        <span>Dashboard</span>
    </a>
</li>
<li class="">
    <a href="#"><i class="fa fa-pie-chart"></i><span>Reports</span></a>
</li>
<li class="{{ Request::is('personalInformations*') ? 'active' : '' }}">
    <a href="{{ route('personalInformations.index') }}"><i class="fa fa-users"></i><span>Manage Persons</span></a>
</li>
<li class="{{ Request::is('configuration*') ? 'active' : '' }} treeview">
    <a href="{{ route('levels.index') }}">
        <i class="fa fa-cog"></i>
        <span>Configuration</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="treeview">
            <a href="#"><i class="fa fa-list"></i> Enum
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('provinces*') ? 'active' : '' }}">
                    <a href="{{ route('provinces.index') }}"><i class="fa fa-edit"></i><span>Provinces</span></a>
                </li>
                
                <li class="{{ Request::is('municipalities*') ? 'active' : '' }}">
                    <a href="{{ route('municipalities.index') }}"><i class="fa fa-edit"></i><span>Municipalities</span></a>
                </li>
                
                <li class="{{ Request::is('eyesColors*') ? 'active' : '' }}">
                    <a href="{{ route('eyesColors.index') }}"><i class="fa fa-edit"></i><span>Eyes Colors</span></a>
                </li>
                
                <li class="{{ Request::is('hairColors*') ? 'active' : '' }}">
                    <a href="{{ route('hairColors.index') }}"><i class="fa fa-edit"></i><span>Hair Colors</span></a>
                </li>

                <li class="{{ Request::is('skinColors*') ? 'active' : '' }}">
                    <a href="{{ route('skinColors.index') }}"><i class="fa fa-edit"></i><span>Skin Colors</span></a>
                </li>
                
                <li class="{{ Request::is('maritalStatuses*') ? 'active' : '' }}">
                    <a href="{{ route('maritalStatuses.index') }}"><i class="fa fa-edit"></i><span>Marital Statuses</span></a>
                </li>
                
                <li class="{{ Request::is('schoolGrades*') ? 'active' : '' }}">
                    <a href="{{ route('schoolGrades.index') }}"><i class="fa fa-edit"></i><span>School Grades</span></a>
                </li>
                
                <li class="{{ Request::is('politicalIntegrations*') ? 'active' : '' }}">
                    <a href="{{ route('politicalIntegrations.index') }}"><i class="fa fa-edit"></i><span>Political Integrations</span></a>
                </li>
                
                <li class="{{ Request::is('ranks*') ? 'active' : '' }}">
                    <a href="{{ route('ranks.index') }}"><i class="fa fa-edit"></i><span>Ranks</span></a>
                </li>
                
                <li class="{{ Request::is('statuses*') ? 'active' : '' }}">
                    <a href="{{ route('statuses.index') }}"><i class="fa fa-edit"></i><span>Statuses</span></a>
                </li>
                
                <li class="{{ Request::is('courseNumbers*') ? 'active' : '' }}">
                    <a href="{{ route('courseNumbers.index') }}"><i class="fa fa-edit"></i><span>Course Numbers</span></a>
                </li>
                
                <li class="{{ Request::is('medicalInformations*') ? 'active' : '' }}">
                    <a href="{{ route('medicalInformations.index') }}"><i class="fa fa-edit"></i><span>Medical Informations</span></a>
                </li>
                
                <li class="{{ Request::is('licenses*') ? 'active' : '' }}">
                    <a href="{{ route('licenses.index') }}"><i class="fa fa-edit"></i><span>Licenses</span></a>
                </li>
                
                <li class="{{ Request::is('nextOfKins*') ? 'active' : '' }}">
                    <a href="{{ route('nextOfKins.index') }}"><i class="fa fa-edit"></i><span>Next Of Kins</span></a>
                </li>
                
                <li class="{{ Request::is('engineTypes*') ? 'active' : '' }}">
                    <a href="{{ route('engineTypes.index') }}"><i class="fa fa-edit"></i><span>Engine Types</span></a>
                </li>
                
                <li class="{{ Request::is('flags*') ? 'active' : '' }}">
                    <a href="{{ route('flags.index') }}"><i class="fa fa-edit"></i><span>Flags</span></a>
                </li>
                
                <li class="{{ Request::is('affiliates*') ? 'active' : '' }}">
                    <a href="{{ route('affiliates.index') }}"><i class="fa fa-edit"></i><span>Affiliates</span></a>
                </li>
                
                <li class="{{ Request::is('languages*') ? 'active' : '' }}">
                    <a href="{{ route('languages.index') }}"><i class="fa fa-edit"></i><span>Languages</span></a>
                </li>
                
                <li class="{{ Request::is('levels*') ? 'active' : '' }}">
                    <a href="{{ route('levels.index') }}"><i class="fa fa-edit"></i><span>Levels</span></a>
                </li>

                <li class="{{ Request::is('licenseEndorsementTypes*') ? 'active' : '' }}">
                    <a href="{{ route('licenseEndorsementTypes.index') }}"><i class="fa fa-edit"></i><span>License Endorsement Types</span></a>
                </li>
                <li class="{{ Request::is('countries*') ? 'active' : '' }}">
                    <a href="{{ route('countries.index') }}"><i class="fa fa-edit"></i><span>Countries</span></a>
                </li>
                <li class="{{ Request::is('licenseEndorsementNames*') ? 'active' : '' }}">
                    <a href="{{ route('licenseEndorsementNames.index') }}"><i class="fa fa-edit"></i><span>License Endorsement Names</span></a>
                </li>
                <li class="{{ Request::is('visaTypes*') ? 'active' : '' }}">
                    <a href="{{ route('visaTypes.index') }}"><i class="fa fa-edit"></i><span>Visa Types</span></a>
                </li>
                <li class="{{ Request::is('familyStatuses*') ? 'active' : '' }}">
                    <a href="{{ route('familyStatuses.index') }}"><i class="fa fa-edit"></i><span>Family Statuses</span></a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-key"></i> Security
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
                </li>
                
                </li><li class="{{ Request::is('roles*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
                </li>
                
                <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
                    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>Permissions</span></a>
                </li>
                
            </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-upload"></i> Import
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.statuses') }}"><i class="fa fa-edit"></i><span>Status</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.rank') }}"><i class="fa fa-edit"></i><span>Rank</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.province') }}"><i class="fa fa-edit"></i><span>Province</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.municipality') }}"><i class="fa fa-edit"></i><span>Municipality</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.school.grade') }}"><i class="fa fa-edit"></i><span>School Grade</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.person') }}"><i class="fa fa-edit"></i><span>Persons</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.course-number') }}"><i class="fa fa-edit"></i><span>Course Number</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.country') }}"><i class="fa fa-edit"></i><span>Country</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.course') }}"><i class="fa fa-edit"></i><span>Course</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.memo') }}"><i class="fa fa-edit"></i><span>Memo</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.passport') }}"><i class="fa fa-edit"></i><span>Passport</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.seamanBook') }}"><i class="fa fa-edit"></i><span>Seaman Book</span></a>
                </li>
                <li class="{{ Request::is('import*') ? 'active' : '' }}">
                    <a href="{{ route('import.family') }}"><i class="fa fa-edit"></i><span>Family</span></a>
                </li>
            </ul>
        </li>
    </ul>
</li>
















