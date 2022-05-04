@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'visasInformation',
    'personalInformationId' => $personalInformation->id
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Visa
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')

    {!! Form::open(['route' => 'visas.store']) !!}

        @include('visas.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Visas List</h3>
        @include('visas.table')
    </div>

@endsection
