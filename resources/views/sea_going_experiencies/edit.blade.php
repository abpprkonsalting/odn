@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'seaGoingExperiencies',
    'personalInformationId' => $seaGoingExperiencies->personalInformation->id  
])
@section('tabs-section-header')
<section class="content-header">
    <h1>
        Sea Going Experiencie
    </h1>
    @include('partials.person_breadcrumbs')
</section>
@endsection

@section('person-content')
            
{!! Form::model($seaGoingExperiencies, ['route' => ['seaGoingExperiencies.update', $seaGoingExperiencies->id], 'method' => 'patch']) !!}

    @include('sea_going_experiencies.fields')

{!! Form::close() !!}

<div class="col-sm-12">
    <h3 class="box-title">Sea Going Experiencies List</h3>
    @include('sea_going_experiencies.table')
</div>

@endsection