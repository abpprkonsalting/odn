<!-- Personal Informations Id Field -->
<div class="form-group">
    {!! Form::label('personal_informations_id', 'Personal Informations Id:') !!}
    <p>{{ $passport->personal_informations_id }}</p>
</div>

<!-- Expedition Date Field -->
<div class="form-group">
    {!! Form::label('expedition_date', 'Expedition Date:') !!}
    <p>{{ $passport->expedition_date }}</p>
</div>

<!-- Expiry Date Field -->
<div class="form-group">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    <p>{{ $passport->expiry_date }}</p>
</div>

<!-- Extension Date Field -->
<div class="form-group">
    {!! Form::label('extension_date', 'Extension Date:') !!}
    <p>{{ $passport->extension_date }}</p>
</div>

<!-- No Passport Field -->
<div class="form-group">
    {!! Form::label('no_passport', 'No Passport:') !!}
    <p>{{ $passport->no_passport }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $passport->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $passport->updated_at }}</p>
</div>

