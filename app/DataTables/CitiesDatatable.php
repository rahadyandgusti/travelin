<?php

namespace App\DataTables;

use App\Models\CitiesModel as Model;
use Yajra\DataTables\Services\DataTable;

class CitiesDatatable extends DataTable
{
    protected $url = 'city';
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)

            ->editColumn('province_id', function ($row) {
                return $row->provinces->name;
            })
            ->addColumn('action', function ($row) {
                $column = "<a href=\"" . route($this->url.'.edit', $row->id) . "\" class=\"btn btn-flat btn-default btn-sm\" data-toggle=\"tooltip\" data-original-title=\"Edit\">
                    <i class=\"fa fa-pencil\"></i>
                </a>
                <a href=\"" . route($this->url.'.destroy', $row->id) . "\" class=\"btn btn-flat btn-danger btn-sm btn-delete\" data-toggle=\"tooltip\" data-original-title=\"Delete\" onclick=\"delete_data(this,'" . csrf_token() . "'); return false;\">
                    <i class=\"fa fa-trash-o\"></i>
                </a>";
                return $column;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Model $model)
    {
        return $model->newQuery()->select($this->getColumnsQuery());
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
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'province_id' => [
                'title' => 'Province'
            ],
            'description'
        ];
    }

    protected function getColumnsQuery()
    {
        return [
            'id',
            'name',
            'province_id',
            'description'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'citiesdatatable_' . time();
    }
}
