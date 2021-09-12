@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Import Memo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'store.memo', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                        @include('import.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
