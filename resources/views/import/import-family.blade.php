@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Import Family
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'store.family', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                        @include('import.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
