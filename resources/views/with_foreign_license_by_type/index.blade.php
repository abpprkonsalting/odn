@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Mariners with foreing license by type</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('with_foreign_license_by_type.index')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

