<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', __('models/examples.fields.foto').':') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('foto', ['class' => 'custom-file-input']) !!}
            {!! Form::label('foto', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Herramienta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('herramienta_id', __('models/examples.fields.herramienta_id').':') !!}
    {!! Form::select('herramienta_id', ['as' => 'as'], null, ['class' => 'form-control custom-select']) !!}
</div>
