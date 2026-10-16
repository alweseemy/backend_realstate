<?php

namespace App\Http\DataTables;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
class SelectUsersDataTable extends DataTable
{
    public function dataTable($query)
    {


        return datatables($query)->setRowId('id')
            ->addColumn('checkbox','<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
            ->addColumn('type','admin.customer.buttons.type')
            ->rawColumns(['checkbox','type'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
        if(request()->has('unit_id') && request('unit_id')!=null) {
           dd(request('unit_id'));
        }
        if (auth()->user()->type=='admin'){
            $query = User::query()->where('type','!=','admin')->where('type','!=','agent');

        }else{

            $query = User::query()->where('manger_id',auth()->user()->id);
        }

        $query->select('users.*');
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        $html =  $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->parameters([
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, trans('orbscope.all_records')]],
                'buttons' => [

                ],
                'scrollX' => true,

                'initComplete' => "function () {
                this.api().columns([1]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).attr( 'style', 'width: 100%');
                $(input).attr( 'class', 'form-control');
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            }",

                'order' => [[1, 'asc']]

            ]);
        if(GetLanguage() == 'ar'){
            $html = $html->parameters([
                'language' => [
                    'url' => url('/vendor/datatables/arabic.json')
                ]
            ]);
        }
        return $html;

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="select-all" onclick="select_all()">',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
            [
                'name' => "name",
                'data'    => 'name',
                'title'   => trans('orbscope.customer'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "type",
                'data'    => 'type',
                'title'   => trans('orbscope.type'),
                'searchable' => true,
                'orderable'  => true,
            ],
        ];




    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LeadsDataTable_' . time();
    }
}
