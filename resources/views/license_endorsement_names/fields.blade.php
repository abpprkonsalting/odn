<!-- License Endorsement Types Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_endorsement_types_id', 'License Endorsement Types:') !!}
    {!! Form::select('license_endorsement_types_id', $license_endorsement_typeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('licenseEndorsementNames.index') }}" class="btn btn-default">Cancel</a>
</div>
