<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $courseNumber->name }}</p>
</div>
<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $courseNumber->code }}</p>
</div>

<!-- Rank Field -->
<div class="form-group">
    {!! Form::label('rank', 'Rank:') !!}
    <p>{{ $courseNumber->rank->name }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $courseNumber->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $courseNumber->updated_at }}</p>
</div>

