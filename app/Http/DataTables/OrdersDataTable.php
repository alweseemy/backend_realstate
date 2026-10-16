<?php

namespace App\Http\DataTables;
use App\Models\Order;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable($query)
    {

        return datatables($query)->setRowId('id')
            ->addColumn('show','admin.orders.buttons.show')
            ->addColumn('edit','admin.orders.buttons.edit')
            ->addColumn('show_status','admin.orders.buttons.show_status')
            ->addColumn('delete','admin.orders.buttons.delete')
            ->addColumn('flat','admin.orders.buttons.flat')
           // ->addColumn('accept_type','admin.orders.buttons.accept_type')
           // ->addColumn('updatedAt','admin.orders.buttons.updatedAt')
            ->rawColumns(['edit', 'delete','show','show_status','flat'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
            $query = Order::query()->with('type')->with('owner')->with('unit')->select('orders.*');


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
            /*
             * columnDefs: [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
        buttons: [
            {
                extend: 'colvis',
                columns: ':not(.noVis)'
            }
        ]
             */
            ->parameters([
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, trans('orbscope.all_records')]],
                'buttons' => [
                    [
                        'text' => '<i class="fa fa-plus"></i> '.trans('orbscope.add'),
                        'className' => 'btn  default createBtn'
                    ],
                    ['extend' => 'print', 'className' => 'btn default', 'text' => '<i class="fa fa-print"></i> '.trans('orbscope.print')],
                    //['extend' => 'csv', 'className' => 'btn  default', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('orbscope.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn default', 'text' => '<i class="fa fa fa-refresh"></i> '.trans('orbscope.reload')],


                ],
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
                'name' => "unit.name",
                'data'    => 'unit.name',
                'title'   => trans('orbscope.unit'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "flat",
                'data'    => 'flat',
                'title'   => trans('orbscope.apartment'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "type.name",
                'data'    => 'type.name',
                'title'   => trans('orbscope.maintenance_type'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "show_status",
                'data'    => 'show_status',
                'title'   => trans('orbscope.status'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "date",
                'data'    => 'date',
                'title'   => trans('orbscope.date'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "owner.name",
                'data'    => 'owner.name',
                'title'   => trans('orbscope.owner'),
                'searchable' => true,
                'orderable'  => true,
            ],
            /*
         [
             'name' => "accept_type",
             'data'    => 'accept_type',
             'title'   => 'قبول المالك',
             'searchable' => true,
             'orderable'  => true,
         ],

         [
             'name' => "updatedAt",
             'data'    => 'updatedAt',
             'title'   => 'تاريخ اخر تعديل',
             'searchable' => true,
             'orderable'  => true,
         ],*/
            [
                'name' => "close_date",
                'data'    => 'close_date',
                'title'   => trans('orbscope.closing_date_request'),
                'searchable' => true,
                'orderable'  => true,
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
        return 'ordersDataTable_' . time();
    }
}