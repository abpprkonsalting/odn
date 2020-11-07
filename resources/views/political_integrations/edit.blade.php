@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Political Integration
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($politicalIntegration, ['route' => ['politicalIntegrations.update', $politicalIntegration->id], 'method' => 'patch']) !!}

                        @include('political_integrations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection