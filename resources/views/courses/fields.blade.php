<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}

<!-- Provinces Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country:') !!}
    {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Certificate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('certificate_number', 'Certificate Number:') !!}
    {!! Form::text('certificate_number', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>

<!-- Course Numbers Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('course_numbers_id', 'Course Number:') !!}
    {!! Form::select('course_numbers_id', $course_numberItems, null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>

<!-- Issue Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    <div class="input-group">
        {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'id'=>'start_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Issue Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    <div class="input-group">
        {!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'id'=>'end_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        //Date picker
        $('#start_date, #end_date').datepicker({
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
