<div class="table-responsive">
    <table class="table" id="activosDeLaEmpresas-table">
        <thead>
        <tr>
            <th>@lang('models/activosDeLaEmpresas.fields.nombre')</th>
        <th>@lang('models/activosDeLaEmpresas.fields.modelo')</th>
        <th>@lang('models/activosDeLaEmpresas.fields.marca')</th>
        <th>@lang('models/activosDeLaEmpresas.fields.diagnostico')</th>
        <th>@lang('models/activosDeLaEmpresas.fields.ODS')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($activosDeLaEmpresas as $activosDeLaEmpresa)
            <tr>
                <td>{{ $activosDeLaEmpresa->nombre }}</td>
            <td>{{ $activosDeLaEmpresa->modelo }}</td>
            <td>{{ $activosDeLaEmpresa->marca }}</td>
            <td>{{ $activosDeLaEmpresa->diagnostico }}</td>
            <td>{{ $activosDeLaEmpresa->ODS }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['activosDeLaEmpresas.destroy', $activosDeLaEmpresa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('activosDeLaEmpresas.show', [$activosDeLaEmpresa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('activosDeLaEmpresas.edit', [$activosDeLaEmpresa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>
