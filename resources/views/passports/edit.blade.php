@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passport
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($passport, ['route' => ['passports.update', $passport->id], 'method' => 'patch']) !!}

                        @include('passports.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection