<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin.action')
            ->addColumn('action', function ($item) {
                $buttons = '';

                $buttons .= '<a class="dropdown-item" href="' . route('admin.users.show', $item->id) . '" title="show"><i class="mdi mdi-eye"></i> Show </a>';

                $buttons .= '<a class="dropdown-item" href="' . route('admin.users.edit', $item->id) . '" title="Edit"><i class="mdi mdi-square-edit-outline"></i> Edit </a>';

                $buttons .= '<form action="' . route('admin.users.destroy', $item->id) . '"  id="delete-form-' . $item->id . '" method="post" style="">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="dropdown-item text-danger" onclick="return makeDeleteRequest(event, ' . $item->id . ')"  type="submit" title="Delete"><i class="mdi mdi-trash-can-outline"></i> Delete</button></form>
                                ';
                return '<div class="btn-group dropdown">
                                <a href="#" onclick="return false;" class="btn btn-sm btn-dark text-white dropdown-toggle dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu">
                                ' . $buttons . '
                                </div>
                                </div>';
            })->editColumn('avatar', function ($item) {
                $url = get_storage_image('user', $item->avatar);

                return '<img class="ic-img-32" src="' . $url . '" alt="' . $item->name . '" />';
            })
            ->rawColumns(['action', 'avatar', 'gender'])->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->where('type', 'user')->latest('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '55px', 'class' => 'text-center', 'printable' => false, 'exportable' => false, 'title' => 'Action'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex', 'SL#'),
            Column::make('avatar', 'avatar')->title('Image'),
            Column::make('name', 'name')->title('Full Name'),
            Column::make('type', 'type')->title('Type'),
            Column::make('email', 'email')->title('Email'),
            Column::make('phone', 'phone')->title('Phone'),
            Column::make('gender', 'gender')->title('Gender'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
