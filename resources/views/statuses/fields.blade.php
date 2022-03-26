<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('is_on_board', 'Is onboard:') !!}
    {!! Form::checkbox('is_on_board', null) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('statuses.index') }}" class="btn btn-default">Cancel</a>
</div>
