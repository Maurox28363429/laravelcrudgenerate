<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/analistasExamples.fields.id').':') !!}
    <p>{{ $analistasExample->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/analistasExamples.fields.created_at').':') !!}
    <p>{{ $analistasExample->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/analistasExamples.fields.updated_at').':') !!}
    <p>{{ $analistasExample->updated_at }}</p>
</div>

<!-- Img Field -->
<div class="col-sm-12">
    {!! Form::label('img', __('models/analistasExamples.fields.img').':') !!}
    <p>{{ $analistasExample->img }}</p>
</div>

<!-- Herramienta Id Field -->
<div class="col-sm-12">
    {!! Form::label('herramienta_id', __('models/analistasExamples.fields.herramienta_id').':') !!}
    <p>{{ $analistasExample->herramienta_id }}</p>
</div>

