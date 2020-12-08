@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'companiesInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
           Company
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'companies.store']) !!}

        @include('companies.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Companies List</h3>
        @include('companies.table')
    </div>
    
@endsection