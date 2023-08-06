<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/examples.fields.id').':') !!}
    <p>{{ $example->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/examples.fields.created_at').':') !!}
    <p>{{ $example->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/examples.fields.updated_at').':') !!}
    <p>{{ $example->updated_at }}</p>
</div>

<!-- Foto Field -->
<div class="col-sm-12">
    {!! Form::label('foto', __('models/examples.fields.foto').':') !!}
    <p>{{ $example->foto }}</p>
</div>

<!-- Herramienta Id Field -->
<div class="col-sm-12">
    {!! Form::label('herramienta_id', __('models/examples.fields.herramienta_id').':') !!}
    <p>{{ $example->herramienta_id }}</p>
</div>

