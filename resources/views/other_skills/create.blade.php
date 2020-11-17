@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'otherSkills',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Other Skills
        </h1>
        <ol class="breadcrumb">
            <li class="active">Internal Number: {{ $personalInformation->internal_file_number }}</li>
            <li class="active">External Number: {{ $personalInformation->external_file_number}}</li>
        </ol>
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'otherSkills.store']) !!}

        @include('other_skills.fields')

    {!! Form::close() !!}
    
@endsection