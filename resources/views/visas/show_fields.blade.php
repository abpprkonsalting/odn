<!-- Visa Types Id Field -->
<div class="form-group">
    {!! Form::label('visa_types_id', 'Visa Types Id:') !!}
    <p>{{ $visa->visa_types_id }}</p>
</div>

<!-- Issue Date Field -->
<div class="form-group">
    {!! Form::label('issue_date', 'Issue Date:') !!}
    <p>{{ $visa->issue_date }}</p>
</div>

<!-- Expiry Date Field -->
<div class="form-group">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    <p>{{ $visa->expiry_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $visa->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $visa->updated_at }}</p>
</div>

