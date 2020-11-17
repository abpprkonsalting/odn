@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'coursesInformation',
    'personalInformationId' => $personalInformation->id  
])

@section('tabs-section-header')
    <section class="content-header">
        <h1>
            Course
        </h1>
        <ol class="breadcrumb">
            <li class="active">Internal Number: {{ $personalInformation->internal_file_number }}</li>
            <li class="active">External Number: {{ $personalInformation->external_file_number}}</li>
        </ol>
    </section>
@endsection

@section('person-content')
                
    {!! Form::open(['route' => 'courses.store']) !!}

        @include('courses.fields')

    {!! Form::close() !!}
    
@endsection
