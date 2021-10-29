<!-- Personal Informations Id Field -->
    {!! Form::hidden('personal_informations_id', $personalInformation->id, []) !!}

<!-- Company Name Field -->
<div class="col-sm-12">
    <div class="row">
        <div class="form-group col-sm-4">
            {!! Form::label('company_name', 'Company Name:') !!}
            {!! Form::text('company_name', null, ['class' => 'form-control','maxlength' => 50]) !!}
        </div>
        
        <!-- Current Field -->
        <div class="form-group col-sm-4">
            <br/>
            <label>
                {!! Form::hidden('current', 0) !!}
                {!! Form::checkbox('current', '1', null) !!}
                Current
            </label>
        </div>
        <!-- Vessel Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('vessel', 'Vessel:') !!}
            {!! Form::text('vessel', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- Sign On Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sign_on_date', 'Sign On Date:') !!}
    <div class="input-group">
        {!! Form::text('sign_on_date', null, ['class' => 'form-control datepicker','id'=>'sign_on_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Sign Off Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sign_off_date', 'Sign Off Date:') !!}
    <div class="input-group">
        {!! Form::text('sign_off_date', null, ['class' => 'form-control datepicker','id'=>'sign_off_date' ,'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
    
</div>

<!-- Dtw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtw', 'Dtw:') !!}
    {!! Form::number('dtw', null, ['class' => 'form-control']) !!}
</div>

<!-- Gross Tonnage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gross_tonnage', 'Gross Tonnage:') !!}
    {!! Form::number('gross_tonnage', null, ['class' => 'form-control']) !!}
</div>

<!-- Engine Types Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('engine_types_id', 'Engine Type:') !!}
    {!! Form::select('engine_types_id', $engine_typeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Bph Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bph', 'Bph:') !!}
    {!! Form::number('bph', null, ['class' => 'form-control']) !!}
</div>

<!-- Power Kw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('power_kw', 'Power Kw:') !!}
    {!! Form::number('power_kw', null, ['class' => 'form-control']) !!}
</div>

<!-- Ranks Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ranks_id', 'Rank:') !!}
    {!! Form::select('ranks_id', $rankItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Flags Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flags_id', 'Flag:') !!}
    {!! Form::select('flags_id', $flagItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Total Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_salary', 'Total Salary:') !!}
    {!! Form::number('total_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Leave Pay Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_pay', 'Leave Pay:') !!}
    {!! Form::number('leave_pay', null, ['class' => 'form-control']) !!}
</div>

<!-- Basic Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('basic_salary', 'Basic Salary:') !!}
    {!! Form::number('basic_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Fix Over Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fix_over_time', 'Fix Over Time:') !!}
    {!! Form::number('fix_over_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_period', 'Contract Period:') !!}
    {!! Form::number('contract_period', null, ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
        //Date picker
        $('#sign_on_date, #sign_off_date').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
</div>
