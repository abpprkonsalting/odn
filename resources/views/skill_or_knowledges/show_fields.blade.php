<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $skillOrKnowledge->name }}</p>
</div>
<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $skillOrKnowledge->code }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $skillOrKnowledge->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $skillOrKnowledge->updated_at }}</p>
</div>

