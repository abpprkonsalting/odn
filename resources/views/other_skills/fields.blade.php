<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id, []) !!}


<!-- Skill Or Knowledge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skill_or_knowledge', 'Skill Or Knowledge:') !!}
    {!! Form::text('skill_or_knowledge', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Or School Field -->
<div class="form-group col-sm-6">
    {!! Form::label('place_or_school', 'Place Or School:') !!}
    {!! Form::text('place_or_school', null, ['class' => 'form-control','maxlength' => 50]) !!}
</div>

<!-- Knowledge Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('knowledge_date', 'Knowledge Date:') !!}
    <div class="input-group">
        {!! Form::text('knowledge_date', null, ['class' => 'form-control datepicker','id'=>'knowledge_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Empirical Field -->
<div class="form-group col-sm-6">
    <br/>
    <div class="checkout">
        <label>
            {!! Form::hidden('empirical', 0) !!}
            {!! Form::checkbox('empirical', '1', null) !!}
            Empirical
        </label>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('otherSkills.index') }}" class="btn btn-default">Cancel</a>
</div>
