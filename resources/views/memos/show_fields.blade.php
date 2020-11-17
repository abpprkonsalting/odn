<!-- Personal Informations Id Field -->
<div class="form-group">
    {!! Form::label('personal_informations_id', 'Personal Informations Id:') !!}
    <p>{{ $memo->personal_informations_id }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', 'Note:') !!}
    <p>{{ $memo->note }}</p>
</div>

<!-- Memo Date Field -->
<div class="form-group">
    {!! Form::label('memo_date', 'Memo Date:') !!}
    <p>{{ $memo->memo_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $memo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $memo->updated_at }}</p>
</div>

