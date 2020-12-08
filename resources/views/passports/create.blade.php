@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'passportsInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Passport
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'passports.store']) !!}

        @include('passports.fields')

    {!! Form::close() !!}
    <div class="col-sm-12">
        <h3 class="box-title">Passports List</h3>
        @include('passports.table')
    </div>
    
@endsection