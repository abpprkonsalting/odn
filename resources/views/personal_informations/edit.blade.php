@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'personalInformation',
    'personalInformationId' => $personalInformation->id
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Personal Information
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::model($personalInformation, ['route' => ['personalInformations.update', $personalInformation->id], 'method' => 'patch', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

        @include('personal_informations.fields')

    {!! Form::close() !!}
    
@endsection