<?php


namespace App\Http\DataTables;
use Yajra\DataTables\Services\DataTable;
class FlatsDatatable extends  DataTable
{

    public function dataTable($query)
    {


        return datatables($query)->setRowId('id')
            ->addColumn('show','admin.units.buttons.show')
            ->addColumn('edit','admin.units.buttons.edit')
            ->addColumn('delete','admin.units.buttons.delete')
            ->rawColumns(['show','edit', 'delete'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
        $query = Unit::query()->with('city')->with('owner')->with('unit_type')->select('units.*');
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
                    [
                        'text' => '<i class="fa fa-plus"></i> '.trans('orbscope.add'),
                        'className' => 'btn  default createBtn'
                    ],
                    ['extend' => 'print', 'className' => 'btn default', 'text' => '<i class="fa fa-print"></i> '.trans('orbscope.print')],
                    ['extend' => 'csv', 'className' => 'btn  default', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('orbscope.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn default', 'text' => '<i class="fa fa fa-refresh"></i> '.trans('orbscope.reload')],
                    [
                        'text' => '<i class="fa fa-trash"></i> '.trans('orbscope.delete'),
                        'className'    => 'btn btn-danger deleteBtn',
                    ],
                ],
                // "scrollX" => true,
                'initComplete' => "function () {
                this.api().columns([1,2,3]).every(function () {
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
                "scrollX" => true,
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
                'name' => "units.name",
                'data'    => 'name',
                'title'   => trans('orbscope.name'),
                'searchable' => true,
                'orderable'  => true,
                'width'      => '70px',
            ],
            [
                'name' => "unit_type.name",
                'data'    => 'unit_type.name',
                'title'   => trans('orbscope.type'),
                'searchable' => true,
                'orderable'  => true,
                'width'      => '70px',
            ],
            [
                'name' => "owner.name",
                'data'    => 'owner.name',
                'title'   => 'ماللك العقار',
                'searchable' => true,
                'orderable'  => true,
                'width'      => '70px',
            ],
            [
                'name' => "city.name",
                'data'    => 'city.name',
                'title'   => trans('orbscope.city'),
                'searchable' => true,
                'orderable'  => true,
                'width'      => '70px',
            ],
            [
                'name' => "district",
                'data'    => 'district',
                'title'   => 'الحي',
                'searchable' => true,
                'orderable'  => true,
                'width'      => '70px',
            ],
            [
                'name' => 'show',
                'data' => 'show',
                'title' => trans('orbscope.show'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
            ],
            [
                'name' => 'edit',
                'data' => 'edit',
                'title' => trans('orbscope.edit'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
            ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => trans('orbscope.delete'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
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
        return 'UnitsDataTable_' . time();
    }
}
