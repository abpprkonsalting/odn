<!-- Internal File Number Field -->
<div class="form-group">
    {!! Form::label('internal_file_number', 'Internal File Number:') !!}
    <p>{{ $personalInformation->internal_file_number }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $personalInformation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $personalInformation->updated_at }}</p>
</div>

