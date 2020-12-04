<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', 'Number:') !!}
    <p>{{ $licenseEndorsement->number }}</p>
</div>

<!-- Issue Date Field -->
<div class="form-group">
    {!! Form::label('issue_date', 'Issue Date:') !!}
    <p>{{ $licenseEndorsement->issue_date }}</p>
</div>

<!-- Expiry Date Field -->
<div class="form-group">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    <p>{{ $licenseEndorsement->expiry_date }}</p>
</div>

<!-- Personal Informations Id Field -->
<div class="form-group">
    {!! Form::label('personal_informations_id', 'Personal Informations Id:') !!}
    <p>{{ $licenseEndorsement->personal_informations_id }}</p>
</div>

<!-- Countries Id Field -->
<div class="form-group">
    {!! Form::label('countries_id', 'Countries Id:') !!}
    <p>{{ $licenseEndorsement->countries_id }}</p>
</div>

<!-- License Endorsement Types Id Field -->
<div class="form-group">
    {!! Form::label('license_endorsement_types_id', 'License Endorsement Types Id:') !!}
    <p>{{ $licenseEndorsement->license_endorsement_types_id }}</p>
</div>

<!-- License Endorsement Names Id Field -->
<div class="form-group">
    {!! Form::label('license_endorsement_names_id', 'License Endorsement Names Id:') !!}
    <p>{{ $licenseEndorsement->license_endorsement_names_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $licenseEndorsement->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $licenseEndorsement->updated_at }}</p>
</div>

