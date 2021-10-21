@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Skill Or Knowledge
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($skillOrKnowledge, ['route' => ['skillOrKnowledges.update', $skillOrKnowledge->id], 'method' => 'patch']) !!}

                        @include('skill_or_knowledges.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection