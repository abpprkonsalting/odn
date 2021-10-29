<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $vessel->name }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $vessel->code }}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{{ $vessel->company_id }}</p>
</div>

<!-- Gross Tank Field -->
<div class="form-group">
    {!! Form::label('gross_tank', 'Gross Tank:') !!}
    <p>{{ $vessel->gross_tank }}</p>
</div>

<!-- Omi Number Field -->
<div class="form-group">
    {!! Form::label('omi_number', 'Omi Number:') !!}
    <p>{{ $vessel->omi_number }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $vessel->active }}</p>
</div>

<!-- Dtw Field -->
<div class="form-group">
    {!! Form::label('dtw', 'Dtw:') !!}
    <p>{{ $vessel->dtw }}</p>
</div>

<!-- Engine Field -->
<div class="form-group">
    {!! Form::label('engine', 'Engine:') !!}
    <p>{{ $vessel->engine }}</p>
</div>

<!-- Vessel Type Id Field -->
<div class="form-group">
    {!! Form::label('vessel_type_id', 'Vessel Type Id:') !!}
    <p>{{ $vessel->vessel_type_id }}</p>
</div>

<!-- Flags Id Field -->
<div class="form-group">
    {!! Form::label('flags_id', 'Flags Id:') !!}
    <p>{{ $vessel->flags_id }}</p>
</div>

<!-- Machine Type Field -->
<div class="form-group">
    {!! Form::label('machine_type', 'Machine Type:') !!}
    <p>{{ $vessel->machine_type }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $vessel->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $vessel->updated_at }}</p>
</div>
