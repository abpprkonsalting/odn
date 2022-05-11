<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250]) !!}
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('sort', 'Sort:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control','max' => 1000]) !!}
</div>
<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ranks_id', 'Rank:') !!}
    {!! Form::select('ranks_id', $ranksItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('courseNumbers.index') }}" class="btn btn-default">Cancel</a>
</div>
