@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'shoreExperiencies',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Shore Experiencies
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'shoreExperiencies.store']) !!}

        @include('shore_experiencies.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Shore Experiencies List</h3>
        @include('shore_experiencies.table')
    </div>
    
@endsection