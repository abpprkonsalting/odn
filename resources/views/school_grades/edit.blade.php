@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            School Grade
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($schoolGrade, ['route' => ['schoolGrades.update', $schoolGrade->id], 'method' => 'patch']) !!}

                        @include('school_grades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection