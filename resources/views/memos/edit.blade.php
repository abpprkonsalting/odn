@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Memo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($memo, ['route' => ['memos.update', $memo->id], 'method' => 'patch']) !!}

                        @include('memos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection