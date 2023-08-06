<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/pedros.fields.id').':') !!}
    <p>{{ $pedros->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/pedros.fields.created_at').':') !!}
    <p>{{ $pedros->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/pedros.fields.updated_at').':') !!}
    <p>{{ $pedros->updated_at }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/pedros.fields.name').':') !!}
    <p>{{ $pedros->name }}</p>
</div>

