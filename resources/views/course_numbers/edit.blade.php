@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Course Number
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($courseNumber, ['route' => ['courseNumbers.update', $courseNumber->id], 'method' => 'patch']) !!}

                        @include('course_numbers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection