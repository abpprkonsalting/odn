<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::select('company_id', $companyItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Gross Tank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gross_tank', 'Gross Tank:') !!}
    {!! Form::number('gross_tank', null, ['class' => 'form-control']) !!}
</div>

<!-- Omi Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('omi_number', 'Omi Number:') !!}
    {!! Form::number('omi_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtw', 'Dtw:') !!}
    {!! Form::number('dtw', null, ['class' => 'form-control']) !!}
</div>

<!-- Engine Field -->
<div class="form-group col-sm-6">
    {!! Form::label('engine', 'Engine:') !!}
    {!! Form::number('engine', null, ['class' => 'form-control']) !!}
</div>

<!-- Vessel Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vessel_type_id', 'Vessel Type Id:') !!}
    {!! Form::number('vessel_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Machine Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('machine_type', 'Machine Type:') !!}
    {!! Form::text('machine_type', null, ['class' => 'form-control','maxlength' => able,max:255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('vessels.index') }}" class="btn btn-default">Cancel</a>
</div>
