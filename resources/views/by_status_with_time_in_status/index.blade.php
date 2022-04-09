@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Mariners by status with time in statusS</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('by_status_with_time_in_status.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

