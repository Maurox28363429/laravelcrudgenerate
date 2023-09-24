@php
use Picqer\Barcode\BarcodeGeneratorPNG;
$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode($activosDeLaEmpresa->nombre, $generator::TYPE_CODE_128);
@endphp
<script src='/canvas.js'></script>
<script>
    function printDivTargetBlank(imprimir) {
        var ventana = window.open('', '_blank');
        ventana.document.write(document.getElementById(imprimir).innerHTML);
        ventana.document.close();
        ventana.focus();
        ventana.onload = function() {
            ventana.print();
        };
    }
    function ObtenerImagen(imprimir) {
        html2canvas(document.getElementById(imprimir)).then(function(canvas) {
            var img = canvas.toDataURL("image/png");
            var link = document.createElement('a');
            link.download = "Asignacion.png";
            link.href = img;
            link.click();
        });
    }
</script>
<!-- Barcode Field -->
<div id='imprimir' style='text-align:center' class="col-sm-12">
    <div class="col-sm-12" style='text-align:center;background:white;padding:1em'>
        <img src="data:image/png;base64,{{ base64_encode($barcode) }}" alt="barcode" />
        <h3>{{$activosDeLaEmpresa->nombre}}</h3>
    </div>
</div>
<div class="col-sm-12" style="text-align:center;">
    <button class="btn btn-primary" onclick="printDivTargetBlank('imprimir')">Imprimir</button>
    <button class="btn btn-default" onclick="ObtenerImagen('imprimir')">Descargar</button>
</div>
<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/activosDeLaEmpresas.fields.id').':') !!}
    <p>{{ $activosDeLaEmpresa->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/activosDeLaEmpresas.fields.created_at').':') !!}
    <p>{{ $activosDeLaEmpresa->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/activosDeLaEmpresas.fields.updated_at').':') !!}
    <p>{{ $activosDeLaEmpresa->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/activosDeLaEmpresas.fields.nombre').':') !!}
    <p>{{ $activosDeLaEmpresa->nombre }}</p>
</div>

<!-- Modelo Field -->
<div class="col-sm-12">
    {!! Form::label('modelo', __('models/activosDeLaEmpresas.fields.modelo').':') !!}
    <p>{{ $activosDeLaEmpresa->modelo }}</p>
</div>

<!-- Marca Field -->
<div class="col-sm-12">
    {!! Form::label('marca', __('models/activosDeLaEmpresas.fields.marca').':') !!}
    <p>{{ $activosDeLaEmpresa->marca }}</p>
</div>

<!-- Diagnostico Field -->
<div class="col-sm-12">
    {!! Form::label('diagnostico', __('models/activosDeLaEmpresas.fields.diagnostico').':') !!}
    <p>{{ $activosDeLaEmpresa->diagnostico }}</p>
</div>

<!-- Ods Field -->
<div class="col-sm-12">
    {!! Form::label('ODS', __('models/activosDeLaEmpresas.fields.ODS').':') !!}
    <p>{{ $activosDeLaEmpresa->ODS }}</p>
</div>

