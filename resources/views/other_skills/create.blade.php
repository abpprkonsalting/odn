@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'otherSkills',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Other Skills
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'otherSkills.store']) !!}

        @include('other_skills.fields')

    {!! Form::close() !!}
    
    <div class="col-sm-12">
        <h3 class="box-title">Other Skill List</h3>
        @include('other_skills.table')
    </div>
    
@endsection