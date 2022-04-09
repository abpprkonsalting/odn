<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}

<!-- Provinces Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('languages_id', 'Language:') !!}
    {!! Form::select('languages_id', $languageItems, ['class' => 'form-control']) !!}
</div>

<!-- Certificate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_skills_id', 'Language Skill:') !!}
    {!! Form::select('language_skills_id', $language_skillItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Course Numbers Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('levels_id', 'level:') !!}
    {!! Form::select('levels_id', $levelItems, null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>
 

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>
