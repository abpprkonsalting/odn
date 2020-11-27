@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'familyInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Family Information
        </h1>
        <ol class="breadcrumb">
            <li class="active">Internal Number: {{ $personalInformation->internal_file_number }}</li>
            <li class="active">External Number: {{ $personalInformation->external_file_number}}</li>
        </ol>
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'familyInformations.store']) !!}

        @include('family_informations.fields')

    {!! Form::close() !!}
    
@endsection