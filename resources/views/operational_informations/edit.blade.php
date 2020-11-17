@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'operationalInformation',
    'personalInformationId' => $operationalInformation->personalInformation->id    
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Operational Information
        </h1>
        <ol class="breadcrumb">
            <li class="active">Internal Number: {{ $operationalInformation->personalInformation->internal_file_number }}</li>
            <li class="active">External Number: {{ $operationalInformation->personalInformation->external_file_number}}</li>
        </ol>
    </section>
@endsection

@section('person-content')
                
    {!! Form::model($operationalInformation, ['route' => ['operationalInformations.update', $operationalInformation->id], 'method' => 'patch']) !!}

        @include('operational_informations.fields')

    {!! Form::close() !!}
    
@endsection