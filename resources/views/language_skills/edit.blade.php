@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Language Skill
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($languageSkill, ['route' => ['languageSkills.update', $languageSkill->id], 'method' => 'patch']) !!}

                        @include('language_skills.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection