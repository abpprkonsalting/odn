<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}

<!-- Provinces Id Field -->
<div class="col-sm-12">
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('medical_informations_id', 'Medical Information:') !!}
            {!! Form::select('medical_informations_id', $medicalInformationItems, null, ['class' => 'form-control']) !!}
        </div>
    </div>
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

<!-- Issue Date Field -->
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>
