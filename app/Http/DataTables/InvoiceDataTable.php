<?php

namespace App\Http\DataTables;
use App\Models\Invoice;
use App\Models\Order;
use Yajra\DataTables\Services\DataTable;

class InvoiceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable($query)
    {

        return datatables($query)->setRowId('id')
            ->addColumn('show','admin.invoice.buttons.show')
            ->addColumn('edit','admin.invoice.buttons.edit')
            ->addColumn('delete','admin.invoice.buttons.delete')
            ->rawColumns(['edit', 'delete','show'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {


            $query = Invoice::query()->with('flat')->with('invoicetype')->with('unit')->select('invoices.*');


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
                'dom' => 'Brfltip',
                "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, trans('orbscope.all_records')]],
                'buttons' => [
                    [
                        'text' => '<i class="fa fa-plus"></i> '.trans('orbscope.add'),
                        'className' => 'btn  default createBtn'
                    ],
                    ['extend' => 'print', 'className' => 'btn default', 'text' => '<i class="fa fa-print"></i> '.trans('orbscope.print')],
                   // ['extend' => 'excel', 'className' => 'btn  default', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('orbscope.export_excel')],
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
                'name' => "flat.unit_number",
                'data'    => 'flat.unit_number',
                'title'   => trans('orbscope.apartment'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "invoicetype.name",
                'data'    => 'invoicetype.name',
                'title'   => trans('orbscope.invoice_type'),
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
        return 'invoiceDataTable_' . time();
    }
}