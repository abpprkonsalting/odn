<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $licenseEndorsementName->name }}</p>
</div>

<!-- License Endorsement Types Id Field -->
<div class="form-group">
    {!! Form::label('license_endorsement_types_id', 'License Endorsement Types Id:') !!}
    <p>{{ $licenseEndorsementName->license_endorsement_types_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $licenseEndorsementName->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $licenseEndorsementName->updated_at }}</p>
</div>

