@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Family Status
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($familyStatus, ['route' => ['familyStatuses.update', $familyStatus->id], 'method' => 'patch']) !!}

                        @include('family_statuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection