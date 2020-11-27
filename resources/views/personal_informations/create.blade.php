@extends('partials.person_tabs', ['activeMenuTemplate' => 'personalInformation'])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Personal Information
        </h1>

    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'personalInformations.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

        @include('personal_informations.fields')

    {!! Form::close() !!}
    
@endsection