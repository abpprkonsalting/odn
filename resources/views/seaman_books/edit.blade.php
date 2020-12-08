@extends('partials.person_tabs', [
    'activeMenuTemplate' => 'seamanBooks',
    'personalInformationId' => $seamanBook->personalInformation->id  
])
@section('tabs-section-header')
<section class="content-header">
    <h1>
        Seaman Book
    </h1>
    @include('partials.person_breadcrumbs')
</section>
@endsection

@section('person-content')
            
{!! Form::model($seamanBook, ['route' => ['seamanBooks.update', $seamanBook->id], 'method' => 'patch']) !!}

    @include('seaman_books.fields')

{!! Form::close() !!}

<div class="col-sm-12">
    <h3 class="box-title">Seaman Books List</h3>
    @include('seaman_books.table')
</div>

@endsection