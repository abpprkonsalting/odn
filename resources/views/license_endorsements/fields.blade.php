<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}
<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Issue Date Field -->

<div class="form-group col-sm-6">
    {!! Form::label('issue_date', 'Issue Date:') !!}
    <div class="input-group">
        {!! Form::text('issue_date', null, ['class' => 'form-control datepicker', 'id'=>'issue_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>


<!-- Expiry Date Field -->

<div class="form-group col-sm-6">
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
            format: 'yyyy-mm-dd'
        })
    </script>
@endpush

<!-- Countries Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('countries_id', 'Countries:') !!}
    {!! Form::select('countries_id', $countryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- License Endorsement Types Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_endorsement_types_id', 'License Endorsement Types:') !!}
    {!! Form::select('license_endorsement_types_id', $license_endorsement_typeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- License Endorsement Names Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_endorsement_names_id', 'License Endorsement Names:') !!}
    {!! Form::select('license_endorsement_names_id', $license_endorsement_nameItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('licenseEndorsements.index') }}" class="btn btn-default">Cancel</a>
</div>
