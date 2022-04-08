<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id) !!}

<!-- Provinces Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_id', 'Language:') !!}
    {!! Form::select('language_id', $languageItems, null, ['class' => 'form-control']) !!}
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
