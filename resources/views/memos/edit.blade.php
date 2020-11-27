@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'memosInformation',
    'personalInformationId' => $memo->personalInformation->id  
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
                
    {!! Form::model($memo, ['route' => ['memos.update', $memo->id], 'method' => 'patch']) !!}

        @include('memos.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Memos List</h3>
        @include('memos.table')
    </div>
    
@endsection