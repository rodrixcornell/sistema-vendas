<?php

namespace App\DataTables;

use App\Models\Cliente;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClienteDataTable extends DataTable
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
            ->addColumn('action', function ($cliente) {
                $roteExcluir = route('clientes.destroy', $cliente);
                $action = link_to_route('clientes.edit', 'Editar', $cliente, ['class' => 'btn btn-primary btn-sm']);
                // $action .= link_to_route('clientes.show', 'Show', $cliente, ['class' => 'btn btn-danger btn-sm ml-1']);
                // $action .= link_to_route('clientes.destroy', 'Excluir', $cliente, ['class' => 'btn btn-danger btn-sm ml-1']);
                $action .= FormFacade::button('Excluir', ['class' => 'btn btn-danger btn-sm ml-1', 'onclick' => 'excluir("' . $roteExcluir . '")']);

                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cliente $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cliente $model)
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
                    ->setTableId('cliente-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->text('Novo Produto'),
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
            Column::make('telefone'),
            Column::make('email'),
            Column::make('cpf'),
            Column::make('cep'),
            Column::make('logradouro'),
            Column::make('bairro'),
            Column::make('localidade'),
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
        return 'Cliente_' . date('YmdHis');
    }
}
