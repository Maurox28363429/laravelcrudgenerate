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
    {!! Form::label('Nombre', __('models/analists.fields.Nombre').':') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Apellido', __('models/analists.fields.Apellido').':') !!}
    {!! Form::text('Apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cedula', __('models/analists.fields.Cedula').':') !!}
    {!! Form::text('Cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Departamento', __('models/analists.fields.Departamento').':') !!}
    {!! Form::select('Departamento', $select_departamentos, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cargo', __('models/analists.fields.Cargo').':') !!}
    {!! Form::select('Cargo', $select_Cargos, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Area', __('models/analists.fields.Area').':') !!}
    {!! Form::select('Area', $select_Areas_De_Trabajo, null, ['class' => 'form-control custom-select']) !!}
</div>
