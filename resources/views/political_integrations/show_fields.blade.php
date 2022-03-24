<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $politicalIntegration->name }}</p>
</div>
<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $politicalIntegration->code }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $politicalIntegration->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $politicalIntegration->updated_at }}</p>
</div>

