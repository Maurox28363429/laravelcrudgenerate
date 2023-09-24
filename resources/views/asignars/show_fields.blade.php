<script src='/canvas.js'></script>
<script>
    function printDivTargetBlank(imprimir) {
        var ventana = window.open('', '_blank');
        ventana.document.write(`
            <style>
                thead tr{
                    border-bottom:2px solid black;
                }
            </style>
        `);
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
@php
use App\Models\activos_de_la_empresa;
use App\Models\herramientas;
use \Carbon\Carbon;
$activos = activos_de_la_empresa::where('nombre', $asignar->Activo)->first();
$herramientas = herramientas::where('Nombre', $asignar->Herramienta)->first();

@endphp

<div id='imprimir' style='text-align:center' class="col-sm-12">
    <div class="col-sm-12" style='text-align:left;background:white;padding:3em'>
        <img src='/images/ait.png' style='width:100px;' />
        <h2 style="text-align: right;">
            Etiqueta del Taller
            @if($asignar->Entrega != null && $asignar->Devuelto == null)
            <span style='background:red;color:white;padding:0.2em;border-radius:0.3em;font-size:18px'>Entregado</span>
            @endif
            @if($asignar->Devuelto != null)
            <span style='background:green;color:white;padding:0.2em;border-radius:0.3em;font-size:18px'>Devuelto</span>
            @endif
        </h2>
        <br>
        <h5>Analista</h5>
        
        <table style="width:100%;">
            <thead>
                <tr style="border-bottom:2px solid black;">
                    <th colspan="2" style='text-align:left'>Analista</th>
                    <th colspan="2" style='text-align:left'>Activo</th>
                    <th colspan="2" style='text-align:left'>Herramienta</th>
                    <th colspan="2" style='text-align:left'>Entrega</th>
                    <th colspan="2" style='text-align:left'>Devuelto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style='text-align:left'>{{ $asignar->Analista }}</td>
                    <td colspan="2" style='text-align:left'>{{ $asignar->Activo }}</td>
                    <td colspan="2" style='text-align:left'>{{ $asignar->Herramienta }}</td>
                    <td colspan="2" style='text-align:left'>{{ $asignar->Entrega }}</td>
                    <td colspan="2" style='text-align:left'>{{ $asignar->Devuelto }}</td>
                </tr>
            </tbody>
        </table>
        @if($activos)
        <br>
        <h5>Activo</h5>
        
        <table style="width:100%;">
            <thead>
                <tr style="border-bottom:2px solid black;">
                    <th colspan="2" style='text-align:left'>ID</th>
                    <th colspan="2" style='text-align:left'>nombre</th>
                    <th colspan="2" style='text-align:left'>marca</th>
                    <th colspan="2" style='text-align:left'>modelo</th>
                    <th colspan="2" style='text-align:left'>Serial</th>
                    <th colspan="2" style='text-align:left'>ODS</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style='text-align:left'>{{ $activos->id }}</td>
                    <td colspan="2" style='text-align:left'>{{ $activos->nombre }}</td>
                    <td colspan="2" style='text-align:left'>{{ $activos->marca }}</td>
                    <td colspan="2" style='text-align:left'>{{ $activos->modelo }}</td>
                    <td colspan="2" style='text-align:left'>{{ $activos->serial }}</td>
                    <td colspan="2" style='text-align:left'>{{ $activos->ODS }}</td>
                </tr>
            </tbody>
        </table>
        @endif
        @if($herramientas)
        <br>
        <h5>Herramienta</h5>
        <br>
        <table style="width:100%;">
            <thead>
                <tr style="border-bottom:2px solid black !important;">
                    <th colspan="2" style='text-align:left'>ID</th>
                    <th colspan="2" style='text-align:left'>Nombre</th>
                    <th colspan="2" style='text-align:left'>codigo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style='text-align:left'>{{ $herramientas->id }}</td>
                    <td colspan="2" style='text-align:left'>{{ $herramientas->Nombre }}</td>
                    <td colspan="2" style='text-align:left'>{{ $herramientas->codigo }}</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</div>
<div class="col-sm-12" style="text-align:center;">
    <button class="btn btn-primary" onclick="printDivTargetBlank('imprimir')">Imprimir</button>
    <button class="btn btn-default" onclick="ObtenerImagen('imprimir')">Descargar</button>
</div>
<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/asignars.fields.id').':') !!}
    <p>{{ $asignar->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/asignars.fields.created_at').':') !!}
    <p>{{ $asignar->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/asignars.fields.updated_at').':') !!}
    <p>{{ $asignar->updated_at }}</p>
</div>

<!-- Analista Field -->
<div class="col-sm-12">
    {!! Form::label('Analista', __('models/asignars.fields.Analista').':') !!}
    <p>{{ $asignar->Analista }}</p>
</div>

<!-- Activo Field -->
<div class="col-sm-12">
    {!! Form::label('Activo', __('models/asignars.fields.Activo').':') !!}
    <p>{{ $asignar->Activo }}</p>
</div>

<!-- Herramienta Field -->
<div class="col-sm-12">
    {!! Form::label('Herramienta', __('models/asignars.fields.Herramienta').':') !!}
    <p>{{ $asignar->Herramienta }}</p>
</div>

<!-- Entrega Field -->
<div class="col-sm-12">
    {!! Form::label('Entrega', __('models/asignars.fields.Entrega').':') !!}
    <p>{{ $asignar->Entrega }}</p>
</div>

<!-- Devuelto Field -->
<div class="col-sm-12">
    {!! Form::label('Devuelto', __('models/asignars.fields.Devuelto').':') !!}
    <p>{{ $asignar->Devuelto }}</p>
</div>