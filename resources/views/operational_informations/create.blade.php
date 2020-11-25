@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'operationalInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Operational Information
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'operationalInformations.store']) !!}

        @include('operational_informations.fields')

    {!! Form::close() !!}
    
@endsection