@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1 class="pull-left">Dashboard <small>Control panel</small></h1>
</section>
<div class="content">
  <div class="clearfix"></div>

  @include('flash::message')

  <div class="clearfix"></div>

  <div class="container-fluid">
    <div class="container-header">

    </div>
    <div class="container-body">
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Personnel Summary</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $personalInformationCount }}</h3>
                  <p>Total</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('personalInformations.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @foreach ($operationalInformationsByStatus as $key => $value)
            <div class="col-sm-6 col-md-4 col-lg-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$value}}</h3>
                  <p>{{$key}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center">

  </div>
</div>
@endsection
