@php
use Carbon\Carbon;
use App\Models\herramientas;
use App\Models\Analist;
use App\Models\activos_de_la_empresa;

if(isset($asignar)){
$herramientas = herramientas::all();
}else{
$herramientas = herramientas::where('stock','>',0)->get();
}
$Analist = Analist::all();
$activos_de_la_empresa = activos_de_la_empresa::all();
$select_herramientas=[
'No asignar'=>'No asignar'
];
$select_Analist=[];
$select_activos_de_la_empresa=[
'No asignar'=>'No asignar'
];

foreach ($herramientas as $key => $value) {
$select_herramientas[$value->Nombre] = $value->Nombre;
}
foreach ($Analist as $key => $value) {
$value->nombre=$value->Nombre.' '.$value->Apellido;
$select_Analist[$value->nombre] = $value->nombre;
}
foreach ($activos_de_la_empresa as $key => $value) {
$select_activos_de_la_empresa[$value->nombre] = $value->nombre;
}
@endphp
<!-- Analista Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Analista', __('models/asignars.fields.Analista').':') !!}
    {!! Form::select('Analista', $select_Analist, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Activo', __('models/asignars.fields.Activo').':') !!}
    {!! Form::select('Activo', $select_activos_de_la_empresa, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Herramienta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Herramienta', __('models/asignars.fields.Herramienta').':') !!}
    {!! Form::select('Herramienta', $select_herramientas, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Entrega', __('models/asignars.fields.Entrega').':') !!}
    {!! Form::date('Entrega', \Carbon\Carbon::now(), ['class' => 'form-control','id'=>'Entrega']) !!}
</div>



<!-- Devuelto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Devuelto', __('models/asignars.fields.Devuelto').':') !!}
    {!! Form::date('Devuelto', null, ['class' => 'form-control','id'=>'Devuelto']) !!}
</div>