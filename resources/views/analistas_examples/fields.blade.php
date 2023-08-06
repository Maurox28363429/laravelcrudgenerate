@php
    use App\Models\herramientas;
    $data= herramientas::all();
    $select=[];
    foreach ($data as $key => $value) {
        $select[$value->id]=$value->Nombre;
    }
@endphp
<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', __('models/analistasExamples.fields.img').':') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('img', ['class' => 'custom-file-input']) !!}
            {!! Form::label('img', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Herramienta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('herramienta_id', __('models/analistasExamples.fields.herramienta_id').':') !!}

    {!! Form::select('herramienta_id', $select, null, ['class' => 'form-control custom-select']) !!}
</div>
