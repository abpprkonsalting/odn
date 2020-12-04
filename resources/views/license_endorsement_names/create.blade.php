@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            License Endorsement Name
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'licenseEndorsementNames.store']) !!}

                        @include('license_endorsement_names.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
