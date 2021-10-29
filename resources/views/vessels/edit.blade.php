@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vessel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vessel, ['route' => ['vessels.update', $vessel->id], 'method' => 'patch']) !!}

                        @include('vessels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection