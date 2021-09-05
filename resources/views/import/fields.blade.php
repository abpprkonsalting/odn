<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'Excel File:') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Import', ['class' => 'btn btn-primary']) !!}
</div>