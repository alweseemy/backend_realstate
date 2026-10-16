<?php

namespace App\Http\DataTables;
use App\Models\Invoice;
use Yajra\DataTables\Services\DataTable;

class ReportUnitWithdrawalDatatable extends DataTable
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
            ->rawColumns(['show'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
        $query = Invoice::query()->where(function($q){
            if(request()->has('type_id')) {
                return $q->where('invoices.unit_id',request()->input('type_id'));
            }
        });
        $query->where(function($q){
            if(request('date_from')!= null and request('date_to')!=null){
                return $q->whereBetween('invoices.date',[request()->get('date_from'),request()->get('date_to')]);
            }
        });
        $query->where(function($q){
            if(request('date_from')!= null and request('date_to')==null){
                return $q->where('invoices.date', '>=', request()->input('date_from'));
            }
        });
        $query->where(function($q){
            if(request('date_from')== null and request('date_to')!=null){
                return $q->where('invoices.date', '<=', request()->input('date_to'));
            }
        });
        // for singel agent all Report

            $query->where('type','withdrawal')->with('flat')->with('unit')->select('invoices.*');


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
                'name' => "date",
                'data'    => 'date',
                'title'   => 'التاريخ',
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "amount",
                'data'    => 'amount',
                'title'   => 'المبلغ',
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "details",
                'data'    => 'details',
                'title'   => 'التفاصيل',
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
