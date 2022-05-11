<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_information_id', $personalInformation->id, []) !!}

<!-- Rank Field -->

<div class="form-group col-sm-6">
    {!! Form::label('rank_id', 'Rank:') !!}
    <div class="input-group">
        {!! Form::select('rank_id', $ranksItems, null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Vessel Field -->

<div class="form-group col-sm-6">
    {!! Form::label('vessel_id', 'Vessel:') !!}
    <div class="input-group">
        {!! Form::select('vessel_id', $vesselItems, null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
<!-- Status Field -->

<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    <div class="input-group">
        {!! Form::select('status_id', $statusesItems, null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Start Date Field -->


<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    <div class="input-group">
        {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'id'=>'start_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- End Date Field -->


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
        $('#issue_date, #expiry_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('shoreExperiencies.index') }}" class="btn btn-default">Cancel</a>
</div>
