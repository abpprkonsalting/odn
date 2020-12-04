@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'licenseEndorsement',
    'personalInformationId' => $licenseEndorsement->personalInformation->id  
])
@section('tabs-section-header')
<section class="content-header">
    <h1>
        License Endorsement
    </h1>
    @include('partials.person_breadcrumbs')
</section>
@endsection

@section('person-content')
            
{!! Form::model($licenseEndorsement, ['route' => ['licenseEndorsements.update', $licenseEndorsement->id], 'method' => 'patch']) !!}

    @include('license_endorsements.fields')

{!! Form::close() !!}

<div class="col-sm-12">
    <h3 class="box-title">License Endorsements List</h3>
    @include('license_endorsements.table')
</div>

@endsection