<?php

namespace App\Http\DataTables;
use App\Models\Service_contract;
use Yajra\DataTables\Services\DataTable;

class UnitService_contractDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */

    protected $unit_id;

    public function LeadID($id)
    {
        $this->unit_id = $id;
        return $this;
    }

    public function dataTable($query)
    {

        return datatables($query)->setRowId('id')
            ->addColumn('edit','admin.service_contracts.buttons.edit')
            ->addColumn('delete','admin.service_contracts.buttons.delete')
            ->rawColumns(['checkbox','edit', 'delete'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {


            $query = Service_contract::query()->where('unit_id',$this->unit_id)->select('service_contracts.*');


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
                'name' => "company_name",
                'data'    => 'company_name',
                'title'   => trans('orbscope.company'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "service_type",
                'data'    => 'service_type',
                'title'   => trans('orbscope.service_type'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "amount",
                'data'    => 'amount',
                'title'   => trans('orbscope.contract_value'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "start_date",
                'data'    => 'start_date',
                'title'   => trans('orbscope.start_date'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "end_date",
                'data'    => 'end_date',
                'title'   => trans('orbscope.end_date'),
                'searchable' => true,
                'orderable'  => true,
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
        return 'service_contractsDataTable_' . time();
    }
}