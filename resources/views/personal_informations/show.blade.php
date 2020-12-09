@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Personal Information
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('personalInformations.pdf', ['id' => $personalInformation->id]) }}"><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
        </h1>
    </section>
    <div class="clearfix"></div>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('personal_informations.show_fields')
                    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
