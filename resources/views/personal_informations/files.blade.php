@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ $personalInformation->full_name }} Files</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body" style="height: 500px;">
                <iframe src="{{ route('personalInformations.iframe', '1') }}" frameborder="no"></iframe>
            </div>
            <p>Session data: {{ session("personalInformationFolder") }}</p>
        </div>
    </div>
@endsection
@section('css')
    <style>
        iframe{
            height: 100%;
            width: 100%;
            overflow: hidden;
            margin: 0; 
            padding: 0;
        }
    </style>
@endsection