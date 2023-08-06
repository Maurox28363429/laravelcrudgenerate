<div class="table-responsive">
    <table class="table" id="examples-table">
        <thead>
        <tr>
            <th>@lang('models/examples.fields.foto')</th>
        <th>@lang('models/examples.fields.herramienta_id')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($examples as $example)
            <tr>
                <td>{{ $example->foto }}</td>
            <td>{{ $example->herramienta_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['examples.destroy', $example->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('examples.show', [$example->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('examples.edit', [$example->id]) }}"
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
