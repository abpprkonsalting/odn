@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Eyes Color
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eyesColor, ['route' => ['eyesColors.update', $eyesColor->id], 'method' => 'patch']) !!}

                        @include('eyes_colors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection