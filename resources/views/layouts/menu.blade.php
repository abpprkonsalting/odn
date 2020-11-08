<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home">
        <i class="fa fa-dashboard"></i> 
        <span>Dashboard</span>
    </a>
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
            <a href="#"><i class="fa fa-circle-o"></i> Enum
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
            </ul>
        </li>
    </ul>
</li>