<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', 'Name:') !!}
    {!! Form::text('company_name', null, ['class' => 'form-control','maxlength' => 500]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flags_id', 'Flag:') !!}
    {!! Form::select('flags_id', $flagItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_type_id', 'Company Type:') !!}
    {!! Form::select('company_type_id', $companyTypeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_mission_id', 'Mission:') !!}
    {!! Form::select('company_mission_id', $companyMissionItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fax', 'Fax:') !!}
    {!! Form::text('fax', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Contact:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
</div>
