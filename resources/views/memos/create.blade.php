@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'memosInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Memo <img class="" src="{{ $personalInformation->avatar }}" width="50px" height="auto" />
        </h1>
        <ol class="breadcrumb">
            <li class="active">Internal Number: {{ $personalInformation->internal_file_number }}</li>
            <li class="active">External Number: {{ $personalInformation->external_file_number}}</li>
        </ol>
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'memos.store']) !!}

        @include('memos.fields')

    {!! Form::close() !!}
    
@endsection