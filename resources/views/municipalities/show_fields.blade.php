<!-- Province Id Field -->
<div class="form-group">
    {!! Form::label('province_id', 'Province Id:') !!}
    <p>{{ $municipality->province_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $municipality->name }}</p>
</div>
<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $municipality->code }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $municipality->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $municipality->updated_at }}</p>
</div>

