<!-- Personal Informations Id Field -->
{!! Form::hidden('personal_informations_id', $personalInformation->id, []) !!}

<!-- Memo Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('memo_date', 'Memo Date:') !!}
    <div class="input-group">
        {!! Form::text('memo_date', null, ['class' => 'form-control datepicker', 'id'=>'memo_date', 'autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        //Date picker
        $('#memo_date').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        })
    </script>
@endpush

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>
