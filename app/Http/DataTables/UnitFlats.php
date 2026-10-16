<?php

namespace App\Http\DataTables;

use App\Models\Flat;
use Yajra\DataTables\Services\DataTable;

class UnitFlats extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */

    protected $lead_id;

    public function LeadID($id)
    {
        $this->lead_id = $id;
        return $this;
    }

    public function dataTable($query)
    {


        return datatables($query)->setRowId('id')
            ->addColumn('checkbox','<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
            ->addColumn('show','admin.flats.buttons.show')
            ->addColumn('edit','admin.flats.buttons.edit')
            ->addColumn('delete','admin.flats.buttons.delete')
            ->rawColumns(['delete','edit','show','checkbox'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
        $query = Flat::query()->where('unit_id',$this->lead_id)->with('flattype')->select('flats.*');
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
                    [
                        'text' => '<i class="fa fa-pencil"></i> '.trans('orbscope.edit'),
                        'className'    => 'btn btn-warning deleteBtn',
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
            'name' => "unit_number",
            'data'    => 'unit_number',
            'title'   => trans('orbscope.unit_number'),
            'searchable' => true,
            'orderable'  => true,
            ],
            [
                'name' => "flattype.name",
                'data'    => 'flattype.name',
                'title'   => trans('orbscope.flat_type'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "area",
                'data'    => 'area',
                'title'   => trans('orbscope.area'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "room",
                'data'    => 'room',
                'title'   => trans('orbscope.bedrooms'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "hall",
                'data'    => 'hall',
                'title'   => trans('orbscope.hall'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "bathroom",
                'data'    => 'bathroom',
                'title'   => trans('orbscope.bathrooms'),
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
        return 'CallsDataTable_' . time();
    }
}