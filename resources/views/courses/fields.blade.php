<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}

<!-- Provinces Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provinces_id', 'Province:') !!}
    {!! Form::select('provinces_id', $provinceItems, null, ['class' => 'form-control']) !!}
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

@push('scripts')
    <script type="text/javascript">
        //Date picker
        $('#issue_date').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        })
    </script>
@endpush

<!-- Course Numbers Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('course_numbers_id', 'Course Number:') !!}
    {!! Form::select('course_numbers_id', $course_numberItems, null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>

<!-- Certificate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('certificate_number', 'Certificate Number:') !!}
    {!! Form::text('certificate_number', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>
