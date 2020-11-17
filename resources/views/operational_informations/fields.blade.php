<!-- Personal Information Id Field -->
{!! Form::hidden('personal_informations_id', isset($personalInformation->id) ? $personalInformation->id : $operationalInformation->personalInformation->id ) !!}

<div class="col-sm-12">
    <div class="row">
        <!-- Disponibility Date Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('disponibility_date', 'Disponibility Date:') !!}
            <div class="input-group">
                {!! Form::text('disponibility_date', null, ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>

        <!-- Rank Id Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('ranks_id', 'Rank:') !!}
            {!! Form::select('ranks_id', $rankItems, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Status Id Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('statuses_id', 'Status:') !!}
            {!! Form::select('statuses_id', $statusesItems, null, ['class' => 'form-control']) !!}
        </div>

    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>