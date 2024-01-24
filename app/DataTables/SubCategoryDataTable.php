<?php

namespace App\DataTables;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.sub-category.edit', $query->id) . "' class='btn btn-primary '><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('admin.sub-category.destroy', $query->id) . "' class='btn btn-danger delete-item ml-2 '><i class='far fa-trash-alt '></i></a>";
                return $editBtn . $deleteBtn;
            })
            ->addColumn('category_name', function ($query) {
                return $query->category->name;
            })
            ->addColumn('category_icon', function ($query) {
                return "<i style='font-size:50px'class='" . $query->category->icon . "'></i>";
            })
            ->addColumn('sub_category_status', function ($query) {
                $status = $query->status == "active" ? 'checked' : '';
                return '<label class="custom-switch mt-2">
                          <input type="checkbox" data-id='.$query->id.' class="custom-switch-input change-status" '.$status.'>
                          <span class="custom-switch-indicator"></span>
                        </label>';

            })
            ->rawColumns(['category_icon','action','sub_category_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SubCategory $model): QueryBuilder
    {
        return $model->newQuery()->with("category");
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('subcategory-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('category_icon')->title('Category icon'),
            Column::make('category_name')->title('Category'),
            Column::make('name')->title('SubCategory'),
            Column::make('sub_category_status')->title('SubCategory Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SubCategory_' . date('YmdHis');
    }
}
