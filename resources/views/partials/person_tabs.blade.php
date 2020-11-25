@extends('layouts.app')

@section('content')

@yield('tabs-section-header')

<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
        @include('flash::message')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body no-padding">
                    @include('partials.person_menu')
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    @yield('person-content')
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>

@endsection