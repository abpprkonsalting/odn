@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Medical Information
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medicalInformation, ['route' => ['medicalInformations.update', $medicalInformation->id], 'method' => 'patch']) !!}

                        @include('medical_informations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection