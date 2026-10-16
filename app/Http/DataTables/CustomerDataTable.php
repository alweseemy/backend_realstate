<?php

namespace App\Http\DataTables;
use App\Models\Contract;
use App\Models\Unit;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
class CustomerDataTable extends DataTable
{
    public function dataTable($query)
    {


        return datatables($query)->setRowId('id')
            ->addColumn('checkbox','<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
            ->addColumn('type','admin.customer.buttons.type')
            ->addColumn('edit','admin.customer.buttons.edit')
            ->addColumn('show','admin.customer.buttons.show')
            ->addColumn('delete','admin.customer.buttons.delete')
            ->rawColumns(['checkbox','delete','edit','show','type'])
            ;
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return mixed
     */
    public function query()
    {


            if (request()->has('unit_id') && request('unit_id') != null) {


                if (request()->has('type') && request('type') != null){

                    if (request('type')=='user'){


                        $flat=Contract::where('unit_id',request('unit_id'))->where('status','progress')->select('user_id')->get()->toArray();

                        if (request()->has('nationality') && request('nationality') != null){

                            $query=User::whereIn('id',$flat)->where('nationality', 'LIKE', '%'.request()->input('nationality').'%')->select('users.*');
                        }else{

                            $query=User::whereIn('id',$flat)->select('users.*');
                        }



                        return $this->applyScopes($query);

                    }elseif (request('type')=='owner'){

                        $unit=Unit::find(request('unit_id'));

                        $query=User::where('id',$unit->owner_id)->get();

                        return $this->applyScopes($query);


                    }else{

                        $unit=Unit::find(request('unit_id'));

                        $query=User::where('id',$unit->guard_id)->get();

                        return $this->applyScopes($query);

                    }

                }else{


                    $flat=Contract::where('unit_id',request('unit_id'))->where('status','progress')->select('user_id')->get()->toArray();
                    $unit=Unit::find(request('unit_id'));
                    $owner=$unit->owner_id;
                    $guard=$unit->guard_id;
                    if ($owner != null){
                        $m=array('user_id'=>$owner);
                        $flat[] = $m;
                    }
                    if ($guard != null){
                        $m=array('user_id'=>$guard);
                        $flat[] = $m;
                    }
                    if (request()->has('nationality') && request('nationality') != null){

                        $query=User::whereIn('id',$flat)->where('nationality', 'LIKE', '%'.request()->input('nationality').'%')->select('users.*');
                    }else{

                        $query=User::whereIn('id',$flat)->select('users.*');
                    }

                    return $this->applyScopes($query);
                }



            }


            $query = User::query();
            $query->where(function ($q) {
                if (request()->has('type') && request('type') != null) {
                    $q->where('users.type', request()->input('type'));
                }
            });
            $query->where(function ($q) {
                if (request()->has('nationality') && request('nationality') != null) {
                    $q->where('users.nationality', 'LIKE', '%'.request()->input('nationality').'%');
                }
            });

            $query->where('type','!=','admin')->where('type','!=','agent')->select('users.*');


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
                    //['extend' => 'csv', 'className' => 'btn  default', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('orbscope.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn default', 'text' => '<i class="fa fa fa-refresh"></i> '.trans('orbscope.reload')],
                    [
                        'text' => '<i class="fa fa-trash"></i> '.trans('orbscope.delete'),
                        'className'    => 'btn btn-danger deleteBtn',
                    ],
                ],
                'scrollX' => true,

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

                'order' => [[1, 'desc']]

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
                'name' => "name",
                'data'    => 'name',
                'title'   => trans('orbscope.customer'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "users.email",
                'data'    => 'email',
                'title'   => trans('orbscope.email'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "phone",
                'data'    => 'phone',
                'title'   => trans('orbscope.phone'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "nationality",
                'data'    => 'nationality',
                'title'   => trans('orbscope.nationality'),
                'searchable' => true,
                'orderable'  => true,
            ],
            [
                'name' => "type",
                'data'    => 'type',
                'title'   => trans('orbscope.type'),
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
        return 'LeadsDataTable_' . time();
    }
}
