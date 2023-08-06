@php
    use App\Models\departamentos;
    use App\Models\Areas_De_Trabajo;
    use App\Models\Cargos;
    $departamentos = departamentos::all();
    $Areas_De_Trabajo = Areas_De_Trabajo::all();
    $Cargos = Cargos::all();
    $select_departamentos = [];
    $select_Areas_De_Trabajo = [];
    $select_Cargos = [];
    foreach ($Cargos as $key => $value) {
        $select_Cargos[$value->nombre] = $value->nombre;
    }
    foreach ($Areas_De_Trabajo as $key => $value) {
        $select_Areas_De_Trabajo[$value->nombre] = $value->nombre;
    }
    foreach ($departamentos as $key => $value) {
        $select_departamentos[$value->nombre] = $value->nombre;
    }
@endphp
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/analistas.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', __('models/analistas.fields.apellido').':') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cedula', __('models/analistas.fields.cedula').':') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Departamento', __('models/analistas.fields.Departamento').':') !!}
    {!! Form::select('Departamento', $select_departamentos, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Area De Trabajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Area de trabajo', __('models/analistas.fields.Area_de_trabajo').':') !!}
    {!! Form::select('Area de trabajo', $select_Areas_De_Trabajo, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cargo', __('models/analistas.fields.Cargo').':') !!}
    {!! Form::select('Cargo', $select_Cargos, null, ['class' => 'form-control custom-select']) !!}
</div>
