@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'personalMedicalInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Personal Medical Information
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'personalMedicalInformations.store']) !!}

        @include('personal_medical_informations.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Personal Medical Information List</h3>
        @include('personal_medical_informations.table')
    </div>
    
@endsection

