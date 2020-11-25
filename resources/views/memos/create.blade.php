@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'memosInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Memo
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'memos.store']) !!}

        @include('memos.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Memos List</h3>
        @include('memos.table')
    </div>
    
@endsection