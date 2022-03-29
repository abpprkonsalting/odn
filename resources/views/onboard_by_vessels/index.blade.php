@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Mariners on board by vessels</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('onboard_by_vessels.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

