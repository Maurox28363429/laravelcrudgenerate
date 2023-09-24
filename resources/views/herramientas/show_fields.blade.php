@php
use Picqer\Barcode\BarcodeGeneratorPNG;
$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode($herramientas->Nombre, $generator::TYPE_CODE_128);
@endphp
<script src='/canvas.js'></script>
<script>
    function printDivTargetBlank(imprimir) {
        var ventana = window.open('', '_blank');
        ventana.document.write(document.getElementById(imprimir).innerHTML);
        ventana.document.close();
        ventana.focus();
        //ventana.onload = function() {
        //    ventana.print();
        //};
    }
    function ObtenerImagen(imprimir) {
        html2canvas(document.getElementById(imprimir)).then(function(canvas) {
            var img = canvas.toDataURL("image/png");
            var link = document.createElement('a');
            link.download = "Asignacion.png";
            link.href = img;
            link.target="_blank";
            link.click();
        });
    }
</script>
<!-- Barcode Field -->
<div id='imprimir' style='text-align:center' class="col-sm-12">
    <div class="col-sm-12" style='text-align:center;background:white;padding:1em'>
        <img src="data:image/png;base64,{{ base64_encode($barcode) }}" alt="barcode" />
        <h3>{{$herramientas->Nombre}}</h3>
    </div>
</div>
<div class="col-sm-12" style="text-align:center;">
    <button class="btn btn-primary" onclick="printDivTargetBlank('imprimir')">Imprimir</button>
    <button class="btn btn-default" onclick="ObtenerImagen('imprimir')">Descargar</button>
</div>
<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/herramientas.fields.id').':') !!}
    <p>{{ $herramientas->id }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('Nombre', __('models/herramientas.fields.Nombre').':') !!}
    <p>{{ $herramientas->Nombre }}</p>
</div>

<!-- Stock Field -->
<div class="col-sm-12">
    {!! Form::label('stock', __('models/herramientas.fields.stock').':') !!}
    <p>{{ $herramientas->stock }}</p>
</div>

<!-- Codigo Field -->
<div class="col-sm-12">
    {!! Form::label('codigo', __('models/herramientas.fields.codigo').':') !!}
    <p>{{ $herramientas->codigo }}</p>
</div>

