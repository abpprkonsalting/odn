<!-- Name Field -->
<div class="form-group">
    {!! Form::label('rank_id', 'Rank:') !!}
    <p>{{ $seaGoingExperiences->rank_id }}</p>
</div>

<div class="form-group">
    {!! Form::label('vessel_id', 'Vessel:') !!}
    <p>{{ $seaGoingExperiences->vessel_id }}</p>
</div>

<div class="form-group">
    {!! Form::label('status_id', 'Status:') !!}
    <p>{{ $seaGoingExperiences->status_id }}</p>
</div>


<!-- StartDate Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $seaGoingExperiences->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $seaGoingExperiences->end_date }}</p>
</div>

<div class="form-group">
    {!! Form::label('contract_time', 'Contract Time:') !!}
    <p>{{ $seaGoingExperiences->contract_time }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $shoreExperiencie->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $shoreExperiencie->updated_at }}</p>
</div>

