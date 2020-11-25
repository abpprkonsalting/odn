@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'operationalInformation',
    'personalInformationId' => $operationalInformation->personalInformation->id    
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Operational Information
        </h1>
        @include('partials.person_breadcrumbs', ['personalInformation' => $operationalInformation->personalInformation ])
    </section>
@endsection

@section('person-content')
                
    {!! Form::model($operationalInformation, ['route' => ['operationalInformations.update', $operationalInformation->id], 'method' => 'patch']) !!}

        @include('operational_informations.fields')

    {!! Form::close() !!}
    
@endsection