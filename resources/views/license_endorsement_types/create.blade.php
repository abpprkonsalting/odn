@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            License Endorsement Type
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'licenseEndorsementTypes.store']) !!}

                        @include('license_endorsement_types.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
