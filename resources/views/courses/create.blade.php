@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'coursesInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Course
        </h1>
        @include('partials.person_breadcrumbs')
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'courses.store']) !!}

        @include('courses.fields')

    {!! Form::close() !!}

    <div class="col-sm-12">
        <h3 class="box-title">Courses List</h3>
        @include('courses.table')
    </div>
    
@endsection
