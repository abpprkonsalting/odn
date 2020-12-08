@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'memosInformation',
    'personalInformationId' => $otherSkill->personalInformation->id  
])
@section('tabs-section-header')
<section class="content-header">
    <h1>
       Other Skill
    </h1>
    @include('partials.person_breadcrumbs')
</section>
@endsection

@section('person-content')
            
{!! Form::model($otherSkill, ['route' => ['otherSkills.update', $otherSkill->id], 'method' => 'patch']) !!}

    @include('other_skills.fields')

{!! Form::close() !!}

<div class="col-sm-12">
    <h3 class="box-title">Other Kill List</h3>
    @include('other_skills.table')
</div>

@endsection