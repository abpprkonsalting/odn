@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'languageInformation',
    'personalInformationId' => $personalInformation->id
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Language Information
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'languageInformations.store']) !!}

        @include('language_informations.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Languages List</h3>
        @include('language_informations.table')
    </div>
    
@endsection
