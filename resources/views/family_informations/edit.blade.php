@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'memosInformation',
    'personalInformationId' => $familyInformation->personalInformation->id  
])
@section('tabs-section-header')
<section class="content-header">
    <h1>
        Family Information
    </h1>
    @include('partials.person_breadcrumbs')
</section>
@endsection

@section('person-content')
            
{!! Form::model($familyInformation, ['route' => ['familyInformations.update', $familyInformation->id], 'method' => 'patch']) !!}

    @include('family_informations.fields')

{!! Form::close() !!}

<div class="col-sm-12">
    <h3 class="box-title">Family Information List</h3>
    @include('family_informations.table')
</div>

@endsection