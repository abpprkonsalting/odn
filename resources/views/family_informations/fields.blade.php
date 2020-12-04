<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','maxlength' => 100]) !!}
</div>

<!-- Next Of Kins Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_of_kins_id', 'Next Of Kins Id:') !!}
    {!! Form::select('next_of_kins_id', $next_of_kinItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Birth Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_date', 'Birth Date:') !!}
    <div class="input-group">
        {!! Form::text('birth_date', null, ['class' => 'form-control datepicker','id'=>'birth_date']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Family Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('family_status', 'Family Status:') !!}
    {!! Form::text('family_status', null, ['class' => 'form-control']) !!}
</div>


<!-- Provinces Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provinces_id', 'Province:') !!}
    {!! Form::select('provinces_id', $provinceItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Municipalities Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipalities_id', 'Municipality:') !!}
    {!! Form::select('municipalities_id', $municipalityItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control','maxlength' => 50]) !!}
</div>

<!-- Same Address As Marine Field -->
<div class="form-group col-sm-6">
    <br/>
    <div class="checkbox">
        <label>
            {!! Form::hidden('same_address_as_marine', 0) !!}
            {!! Form::checkbox('same_address_as_marine', '1', null) !!}
            Same as marine:
        </label>
    </div>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
        //Date picker
        $('#birth_date').datepicker({
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
