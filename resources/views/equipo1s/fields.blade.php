@php
use Carbon\Carbon;
use App\Models\piezas;
use App\Models\activos_de_la_empresa;
$activos_de_la_empresa = activos_de_la_empresa::all();
$select_activos_de_la_empresa=[
'No asignar'=>'No asignar'
];
foreach ($activos_de_la_empresa as $key => $value) {
$select_activos_de_la_empresa[$value->nombre] = $value->nombre;
}
$piezas = piezas::all();
$piezas_array = [];
foreach ($piezas as $pieza) {
$piezas_array[$pieza->id] = $pieza->name.'-'.$pieza->marca.'-'.$pieza->serial;
if(isset($equipo1)){
$pienzas_seleccionadas = json_decode($equipo1->piezas);
}
$checked = '';
}
@endphp
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/asignars.fields.Activo').':') !!}
    {!! Form::select('nombre', $select_activos_de_la_empresa, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Piezas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piezas', __('models/equipo1s.fields.piezas').':') !!}
    @foreach ($piezas_array as $key => $value)
    <div class="form-check">
        @php
        if(isset($equipo1) && in_array($value, $pienzas_seleccionadas)){
        $checked = 'checked';
        }else{
        $checked = '';
        }
        @endphp
        {!! Form::checkbox('piezas[]', $value, $checked, ['class' => 'form-check-input']) !!}
        {!! Form::label('piezas', $value, ['class' => 'form-check-label']) !!}
    </div>
    @endforeach
</div>