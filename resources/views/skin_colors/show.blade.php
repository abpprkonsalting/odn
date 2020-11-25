@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Skin Color
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('skin_colors.show_fields')
                    <a href="{{ route('skinColors.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
