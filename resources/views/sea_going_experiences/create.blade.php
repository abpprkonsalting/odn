@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'seaGoingExperiences',
    'personalInformationId' => $personalInformation->id
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Sea Going Experiencies
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')

    {!! Form::open(['route' => 'seaGoingExperiences.store']) !!}

        @include('sea_going_experiences.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Sea going Experiencies List</h3>
        @include('sea_going_experiences.table')
    </div>

@endsection
