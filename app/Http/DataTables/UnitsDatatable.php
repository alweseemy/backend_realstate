<?php


namespace App\Http\DataTables;
use App\Models\Unit;
use Yajra\DataTables\Services\DataTable;
class UnitsDatatable extends  DataTable
{

    public function dataTable($query)
    {


        return datatables($query)->setRowId('id')
            ->addColumn('show','admin.units.buttons.show')
            ->addColumn('add_flat','admin.units.buttons.add_flat')
            ->addColumn('show_flats','admin.units.buttons.show_flats')
            ->addColumn('edit','admin.units.buttons.edit')
            ->addColumn('delete','admin.units.buttons.delete')
            ->rawColumns(['show','edit', 'delete','add_flat','show_flats'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {
        $query = Unit::query();
        $query->where(function ($q) {
            if (request()->has('city_id') && request('city_id') != null) {
                $q->where('units.city_id', request()->input('city_id'));
            }
        });
        $query->where(function ($q) {
            if (request()->has('hood_id') && request('hood_id') != null) {
                $q->where('units.hood_id', request()->input('hood_id'));
            }
        });
        $query->where(function ($q) {
            if (request()->has('type') && request('type') != null) {
                $q->where('units.unittype_id', request()->input('type'));
            }
        });
        $query->with('city')->with('hood')->with('owner')->with('unit_type')->select('units.*');
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
                        'text' => '<i class="fa fa-plus"></i> '.trans('orbscope.add').' '.trans('orbscope.units'),
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
                'title'   => trans('orbscope.owner'),
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
                'name' => "hood.name",
                'data'    => 'hood.name',
                'title'   => trans('orbscope.hood'),
                'searchable' => true,
                'orderable'  => true,
                'width'      => '70px',
            ],
            [
                'name' => "postal_code",
                'data'    => 'postal_code',
                'title'   => trans('orbscope.piece_number'),
                'searchable' => true,
                'orderable'  => true,
                'width'      => '70px',
            ],
            [
                'name' => "extra_number",
                'data'    => 'extra_number',
                'title'   => trans('orbscope.aquarium_number'),
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
            'name' => 'show_flats',
            'data' => 'show_flats',
            'title' => trans('orbscope.apartments'),
            'exportable' => false,
            'printable'  => false,
            'searchable' => false,
            'orderable'  => false,
            ],
            [
                'name' => 'add_flat',
                'data' => 'add_flat',
                'title' => trans('orbscope.add').' '.trans('orbscope.apartment'),
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
