@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'languageInformation',
    'personalInformationId' => $languageInformation->personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Language Informations
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::model($languageInformation, ['route' => ['LanguageInformations.update', $languageInformation->id], 'method' => 'patch']) !!}

        @include('language_informations.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Courses List</h3>
        @include(language_informations.table')
    </div>
    
@endsection