@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Languages
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($languages, ['route' => ['languages.update', $languages->id], 'method' => 'patch']) !!}

                        @include('languages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection