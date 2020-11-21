<?php

namespace App\DataTables;

use App\Fabricante;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FabricanteDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($fabricante) {
                $action = link_to_route('fabricantes.edit', 'Editar', $fabricante, ['class' => 'btn btn-primary btn-sm']);
                $action .= link_to_route('fabricantes.show', 'Excluir', $fabricante, ['class' => 'btn btn-danger btn-sm ml-1']);

                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Fabricante $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Fabricante $model)
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
                    ->setTableId('fabricante-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->text('Novo Fabricante'),
                        Button::make('export')->text('Exportar'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120)
                  ->title('Ações')
                  ->addClass('text-center'),
            Column::make('id')->title('#'),
            Column::make('nome'),
            Column::make('site'),
            Column::make('created_at')->title('Criado em'),
            Column::make('updated_at')->title('Atualizado em'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Fabricante_' . date('YmdHis');
    }
}
