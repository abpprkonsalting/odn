@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Import School Grade
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'store.school.grade', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                        @include('import.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
