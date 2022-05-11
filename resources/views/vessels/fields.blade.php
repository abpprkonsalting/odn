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
    {!! Form::label('companies_id', 'Company:') !!}
    {!! Form::select('companies_id', $companyItems, null, ['class' => 'form-control']) !!}
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
    {!! Form::label('dwt', 'Dwt:') !!}
    {!! Form::number('dwt', null, ['class' => 'form-control']) !!}
</div>

<!-- Engine Field -->
<div class="form-group col-sm-6">
    {!! Form::label('engine_power', 'Engine Power:') !!}
    {!! Form::number('engine_power', null, ['class' => 'form-control']) !!}
</div>

<!-- Vessel Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vessel_type_id', 'Vessel Type:') !!}
    {!! Form::select('vessel_type_id', $vesselTypeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Machine Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('engine_type_id', 'Engine Type:') !!}
    {!! Form::select('engine_type_id',$engineTypeItems, null, ['class' => 'form-control','maxlength' => 'nullable,max:255']) !!}
</div>
<!-- Flag Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flags_id', 'flag:') !!}
    {!! Form::select('flags_id',$flagItems, null, ['class' => 'form-control','maxlength' => 'nullable,max:255']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('active', 'Is active:') !!}
    {!! Form::checkbox('active', null) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('vessels.index') }}" class="btn btn-default">Cancel</a>
</div>
