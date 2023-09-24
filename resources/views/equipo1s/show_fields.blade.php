@php
use Picqer\Barcode\BarcodeGeneratorPNG;
$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode($equipo1->nombre, $generator::TYPE_CODE_128);
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
        <h3>{{$equipo1->nombre}}</h3>
    </div>
</div>
<div class="col-sm-12" style="text-align:center;">
    <button class="btn btn-primary" onclick="printDivTargetBlank('imprimir')">Imprimir</button>
    <button class="btn btn-default" onclick="ObtenerImagen('imprimir')">Descargar</button>
</div>
<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/equipo1s.fields.id').':') !!}
    <p>{{ $equipo1->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/equipo1s.fields.created_at').':') !!}
    <p>{{ $equipo1->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/equipo1s.fields.updated_at').':') !!}
    <p>{{ $equipo1->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/equipo1s.fields.nombre').':') !!}
    <p>{{ $equipo1->nombre }}</p>
</div>

<!-- Piezas Field -->
<div class="col-sm-12">
    {!! Form::label('piezas', __('models/equipo1s.fields.piezas').':') !!}
    @php
    $piezas_array = [];
    $piezas=json_decode($equipo1->piezas);
    foreach ($piezas as $pieza) {
    $piezas_array[] = $pieza;
    }
    @endphp
    <ul>
        @foreach ($piezas_array as $pieza)
        <li>{{ $pieza }}</li>
        @endforeach
    </ul>
</div>