<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}


<!-- No Passport Field -->
<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('no_passport', 'No Passport:') !!}
        {!! Form::text('no_passport', null, ['class' => 'form-control', 'maxlength' => 50, 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('countries_id', 'Country:') !!}
        {!! Form::select('countries_id', $countriesItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Expedition Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expedition_date', 'Expedition Date:') !!}
    <div class="input-group">
        {!! Form::text('expedition_date', null, ['class' => 'form-control datepicker', 'id' => 'expedition_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Expiry Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    <div class="input-group">
        {!! Form::text('expiry_date', null, ['class' => 'form-control datepicker', 'id' => 'expiry_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Extension Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extension_date', 'Extension Date:') !!}
    <div class="input-group">
        {!! Form::text('extension_date', null, ['class' => 'form-control datepicker', 'id' => 'extension_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Expiry Extension Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiry_extension_date', 'Expity Extension Date:') !!}
    <div class="input-group">
        {!! Form::text('expiry_extension_date', null, ['class' => 'form-control datepicker', 'id' => 'expiry_extension_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        //Date picker
        $('#expedition_date, #expiry_date, #extension_date, #expiry_extension_date').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>
