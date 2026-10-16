<?php

namespace App\Http\DataTables;
use App\Models\Payment;
use Yajra\DataTables\Services\DataTable;

class PaymentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable($query)
    {

        return datatables($query)->setRowId('id')
            ->addColumn('show','admin.payments.buttons.show')
            ->addColumn('delete','admin.payments.buttons.delete')
            ->rawColumns(['delete','show'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
        if (auth()->user()->type == 'admin'){

            $query = Payment::query()->where('type','yes')->with('flat')->with('owner')->with('user')->with('unit')->select('payments.*');

        }else{
            $query = Payment::query()->where('type','yes')->where('manger_id',auth()->id())->with('owner')->with('user')->with('flat')->with('unit')->select('payments.*');

        }
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
                    ['extend' => 'print', 'className' => 'btn default', 'text' => '<i class="fa fa-print"></i> '.trans('orbscope.print')],
                    ['extend' => 'csv', 'className' => 'btn  default', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('orbscope.export_csv')],
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
                'name' => "invoce_number",
                'data'    => 'invoce_number',
                'title'   => 'رقم الفاتورة',
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "unit.name",
                'data'    => 'unit.name',
                'title'   => 'العقار',
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "flat.name",
                'data'    => 'flat.name',
                'title'   => 'الوحدة',
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "owner.name",
                'data'    => 'owner.name',
                'title'   => 'الماللك',
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "user.name",
                'data'    => 'user.name',
                'title'   => 'المستاجر',
                'searchable' => true,
                'orderable'  => true,
            ],
             /*
            [
                'name' => "date",
                'data'    => 'date',
                'title'   => 'التاريخ',
                'searchable' => true,
                'orderable'  => true,
            ],
             */
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
        return 'paymentsDataTable_' . time();
    }
}