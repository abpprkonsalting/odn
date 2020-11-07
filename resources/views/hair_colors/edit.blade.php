@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hair Color
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hairColor, ['route' => ['hairColors.update', $hairColor->id], 'method' => 'patch']) !!}

                        @include('hair_colors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection