<?php

namespace App\DataTables;

use App\Models\Mis_analistass;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Mis_analistassDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'mis_analistasses.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Mis_analistass $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Mis_analistass $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'Nombre' => new Column(['title' => __('models/misAnalistasses.fields.Nombre'), 'data' => 'Nombre']),
            'Indicador' => new Column(['title' => __('models/misAnalistasses.fields.Indicador'), 'data' => 'Indicador']),
            'Cedula' => new Column(['title' => __('models/misAnalistasses.fields.Cedula'), 'data' => 'Cedula']),
            'Departamento' => new Column(['title' => __('models/misAnalistasses.fields.Departamento'), 'data' => 'Departamento']),
            'Area_de_trabajo' => new Column(['title' => __('models/misAnalistasses.fields.Area_de_trabajo'), 'data' => 'Area_de_trabajo']),
            'Cargo' => new Column(['title' => __('models/misAnalistasses.fields.Cargo'), 'data' => 'Cargo'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'mis_analistasses_datatable_' . time();
    }
}
