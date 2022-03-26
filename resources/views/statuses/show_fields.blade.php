<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $status->name }}</p>
</div>
<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $status->code }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('is_on_board', 'Is onboard:') !!}
    @if($status->is_on_board)
    <p> yes</p>
    @else
    <p> no</p>        
    @endif
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $status->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $status->updated_at }}</p>
</div>

