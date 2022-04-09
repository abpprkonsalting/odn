<!-- Personal Informations Id Field -->
<div class="form-group">
    {!! Form::label('personal_informations_id', 'Personal Informations Id:') !!}
    <p>{{ $course->personal_informations_id }}</p>
</div>

<!-- Language Id Field -->
<div class="form-group">
    {!! Form::label('languages_id', 'Language Id:') !!}
    <p>{{ $languagueInformation->languages_id }}</p>
</div>

<!-- Language Skills Id Field -->
<div class="form-group">
    {!! Form::label('language_skills_id', 'Language Skills Id:') !!}
    <p>{{ $LanguageInfirmation->language_skills_id }}</p>
</div>

<!-- Levels Field -->
<div class="form-group">
    {!! Form::label('levels_id', 'Levels Id:') !!}
    <p>{{ $LanguageInfirmation->levels_id }}</p>
</div>



<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $course->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $course->updated_at }}</p>
</div>

