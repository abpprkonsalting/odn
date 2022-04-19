<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}

<div class="form-group col-sm-4">
    {!! Form::label('languages_id', 'Language:') !!}
    {!! Form::select('languages_id', $languageItems, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('language_skills_id', 'Skill:') !!}
    {!! Form::select('language_skills_id', $languageSkillItems, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('levels_id', 'level:') !!}
    {!! Form::select('levels_id', $levelItems, null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>
 
<div class="form-group col-sm-12" style="display: flex;justify-content: flex-end;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('languageInformations.index') }}" class="btn btn-default" style="margin-left:5px">Cancel</a>
</div>

@push('scripts')
    <script src="{{ asset('/js/personalInformation.js') }}" type="text/javascript"></script>
@endpush
