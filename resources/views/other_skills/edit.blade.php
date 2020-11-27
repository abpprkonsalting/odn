@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Other Skill
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($otherSkill, ['route' => ['otherSkills.update', $otherSkill->id], 'method' => 'patch']) !!}

                        @include('other_skills.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection