@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'shoreExperiencies',
    'personalInformationId' => $shoreExperiencie->personalInformation->id  
])
@section('tabs-section-header')
<section class="content-header">
    <h1>
        Shore Experiencie
    </h1>
    @include('partials.person_breadcrumbs')
</section>
@endsection

@section('person-content')
            
{!! Form::model($shoreExperiencie, ['route' => ['shoreExperiencies.update', $shoreExperiencie->id], 'method' => 'patch']) !!}

    @include('shore_experiencies.fields')

{!! Form::close() !!}

<div class="col-sm-12">
    <h3 class="box-title">Shore Experiencies List</h3>
    @include('shore_experiencies.table')
</div>

@endsection