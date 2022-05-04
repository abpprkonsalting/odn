<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id, []) !!}

<!-- Visa Types Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visa_types_id', 'Visa Type:') !!}
    {!! Form::select('visa_types_id', $visa_typeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Passport Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passports_id', 'Passport:') !!}
    {!! Form::select('passports_id', $passportItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('countries_id', 'Country:') !!}
    {!! Form::select('countries_id', $countriesItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Issue Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('issue_date', 'Issue Date:') !!}
    <div class="input-group">
        {!! Form::text('issue_date', null, ['class' => 'form-control datepicker', 'id'=>'issue_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Expiry Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    <div class="input-group">
        {!! Form::text('expiry_date', null, ['class' => 'form-control datepicker', 'id'=>'expiry_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        //Date picker
        $('#issue_date, #expiry_date').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('visas.index') }}" class="btn btn-default">Cancel</a>
</div>
