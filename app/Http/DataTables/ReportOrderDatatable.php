<?php

namespace App\Http\DataTables;
use App\Models\Invoice;
use App\Models\Order;
use Yajra\DataTables\Services\DataTable;

class ReportOrderDatatable extends DataTable
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
            ->addColumn('show_status','admin.orders.buttons.show_status')
            ->addColumn('flat_name','admin.orders.buttons.flat')
            ->rawColumns(['show','show_status','flat_name'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
        $query = Order::query()->where(function($q){
            if(request('unit_id')!=null) {
                return $q->where('orders.unit_id',request()->input('unit_id'));
            }
        });
        $query->where(function($q){
            if(request('order_type')!= null){
                return $q->where('orders.order_type',request()->input('order_type'));
            }
        });
        $query->where(function($q){
            if(request('status')!= null){
                return $q->where('orders.status',request()->input('status'));
            }
        });
        $query->where(function($q){
            if(request('date_from')!= null and request('date_to')!=null){
                return $q->whereBetween('orders.date',[request()->get('date_from'),request()->get('date_to')]);
            }
        });
        $query->where(function($q){
            if(request('date_from')!= null and request('date_to')==null){
                return $q->where('orders.date', '>=', request()->input('date_from'));
            }
        });
        $query->where(function($q){
            if(request('date_from')== null and request('date_to')!=null){
                return $q->where('orders.date', '<=', request()->input('date_to'));
            }
        });
        // for singel agent all Report



            $query->where('manger_id',auth()->id())->with('flat')->with('unit')->with('type')->select('orders.*');





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
                    ['extend' => 'print', 'className' => 'btn default', 'text' => '<i class="fa fa-print"></i> '.trans('orbscope.print')],
                    ['extend' => 'csv', 'className' => 'btn  default', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('orbscope.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn default', 'text' => '<i class="fa fa fa-refresh"></i> '.trans('orbscope.reload')],
                ],
                'initComplete' => "function () {
                this.api().columns([0]).every(function () {
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
                'order' => [[0, 'asc']]

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
                'title'   =>  trans('orbscope.unit'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "flat_name",
                'data'    => 'flat_name',
                'title'   => trans('orbscope.apartment'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "amount",
                'data'    => 'amount',
                'title'   =>  trans('orbscope.amount_money'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "date",
                'data'    => 'date',
                'title'   =>  trans('orbscope.date'),
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
                'name' => 'show',
                'data' => 'show',
                'title' => trans('orbscope.show'),
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
        return 'MeetingsDataTable_' . time();
    }
}
