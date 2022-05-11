@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'seaGoingExperiences',
    'personalInformationId' => $seaGoingExperience->personalInformation->id
])
@section('tabs-section-header')
<section class="content-header">
    <h1>
        Sea Going Experience
    </h1>
    @include('partials.person_breadcrumbs')
</section>
@endsection

@section('person-content')

{!! Form::model($seaGoingExperience, ['route' => ['seaGoingExperiences.update', $seaGoingExperience->id], 'method' => 'patch']) !!}

    @include('sea_going_experiences.fields')

{!! Form::close() !!}

<div class="col-sm-12">
    <h3 class="box-title">Sea Going Experiences List</h3>
    @include('sea_going_experiences.table')
</div>

@endsection
