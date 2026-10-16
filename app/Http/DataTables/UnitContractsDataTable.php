<?php

namespace App\Http\DataTables;
use App\Models\Agreement;
use App\Models\Contract;
use Yajra\DataTables\Services\DataTable;

class UnitContractsDataTable extends DataTable
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
            ->addColumn('show','admin.contracts.buttons.show')
            ->addColumn('contract_status','admin.contracts.buttons.contract_status')
            ->addColumn('edit','admin.contracts.buttons.edit')
            ->addColumn('renew','admin.contracts.buttons.renew')
            ->addColumn('delete','admin.contracts.buttons.delete')
            ->rawColumns(['checkbox','edit', 'delete','contract_status','show','renew'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {


            $query = Contract::query()->where('unit_id',$this->unit_id)->with('user')->with('flat')->with('unit')->select('contracts.*');


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
                   // ['extend' => 'csv', 'className' => 'btn  default', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('orbscope.export_csv')],
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
                'name' => "contract_number",
                'data'    => 'contract_number',
                'title'   => trans('orbscope.contract_number'),
                'searchable' => true,
                'orderable'  => true,
            ],
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
                'name' => "user.name",
                'data'    => 'user.name',
                'title'   => trans('orbscope.user'),
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
                'name' => "month",
                'data'    => 'month',
                'title'   => trans('orbscope.date_range'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "price",
                'data'    => 'price',
                'title'   => trans('orbscope.annual_rent_amount'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "insurance",
                'data'    => 'insurance',
                'title'   => trans('orbscope.tax_percentage'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "contract_status",
                'data'    => 'contract_status',
                'title'   =>trans('orbscope.status'),
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
                'name' => 'renew',
                'data' => 'renew',
                'title' => trans('front.renew'),
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
        return 'contractsDataTable_' . time();
    }
}