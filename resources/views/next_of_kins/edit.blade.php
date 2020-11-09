@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Next Of Kin
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nextOfKin, ['route' => ['nextOfKins.update', $nextOfKin->id], 'method' => 'patch']) !!}

                        @include('next_of_kins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection