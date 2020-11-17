@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Family Information
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($familyInformation, ['route' => ['familyInformations.update', $familyInformation->id], 'method' => 'patch']) !!}

                        @include('family_informations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection