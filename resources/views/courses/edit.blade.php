@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'coursesInformation',
    'personalInformationId' => $course->personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Courses
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::model($course, ['route' => ['courses.update', $course->id], 'method' => 'patch']) !!}

        @include('courses.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Courses List</h3>
        @include('courses.table')
    </div>
    
@endsection