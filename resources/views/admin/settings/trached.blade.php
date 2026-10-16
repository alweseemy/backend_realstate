@extends(AdminCore())
@section('content')

    <div class='row'>
        <div class="col-md-12">

            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{trans('orbscope.trash')}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>


                <div class="portlet-body" lang="en">
                    <div class="portlet light bordered">

                        <div class="portlet-body">
                            <!--
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1" lang="en">
                                <thead>
                                <tr>

                                    <th> {{trans('orbscope.name')}} {{trans('orbscope.or')}} {{trans('orbscope.number')}}</th>
                                    <th>{{trans('orbscope.deleted_date')}} </th>
                                    <th> {{trans('log.settings')}} </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\User::onlyTrashed()->get() as $in)
                                    <tr class="odd gradeX">

                                        <td width="40%;"> {{trans('orbscope.agent')}}/{{trans('front.user')}}  {{@$in->name}}  </td>
                                        <!--
                                        <td>
                                            <span class="label label-sm label-success"> Approved </span>
                                        </td>-->
                                        <td > {{$in->deleted_at}} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('log.settings')}}
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('admin/delete_trach/customer/'.$in->id)}}">
                                                            <i class="icon-trash"></i> {{trans('orbscope.permanent_deletion')}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('admin/restore_trach/customer/'.$in->id)}}">
                                                            <i class="icon-flag"></i> {{trans('orbscope.recovery')}}

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach(\App\Models\Unit::onlyTrashed()->get() as $in)
                                    <tr class="odd gradeX">

                                        <td width="40%;"> {{trans('orbscope.unit')}}  {{@$in->name}}  </td>
                                        <!--
                                        <td>
                                            <span class="label label-sm label-success"> Approved </span>
                                        </td>-->
                                        <td > {{$in->deleted_at}} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('log.settings')}}
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('admin/delete_trach/unit/'.$in->id)}}">
                                                            <i class="icon-trash"></i> {{trans('orbscope.permanent_deletion')}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('admin/restore_trach/unit/'.$in->id)}}">
                                                            <i class="icon-flag"></i> {{trans('orbscope.recovery')}}

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach(\App\Models\Flat::onlyTrashed()->get() as $in)
                                    <tr class="odd gradeX">

                                        <td width="40%;"> {{trans('orbscope.apartment')}}  {{@$in->unit_number}}  </td>
                                        <!--
                                        <td>
                                            <span class="label label-sm label-success"> Approved </span>
                                        </td>-->
                                        <td > {{$in->deleted_at}} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('log.settings')}}
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('admin/delete_trach/flat/'.$in->id)}}">
                                                            <i class="icon-trash"></i> {{trans('orbscope.permanent_deletion')}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('admin/restore_trach/flat/'.$in->id)}}">
                                                            <i class="icon-flag"></i> {{trans('orbscope.recovery')}}

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach(\App\Models\Invoice::onlyTrashed()->get() as $in)
                                <tr class="odd gradeX">

                                    <td width="40%;"> {{trans('orbscope.invoice')}}  {{@$in->unit->name}} - {{trans('orbscope.date')}} {{$in->date}} </td>
                                    <!--
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>-->
                                    <td > {{$in->deleted_at}} </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('log.settings')}}
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="{{url('admin/delete_trach/invoice/'.$in->id)}}">
                                                        <i class="icon-trash"></i> {{trans('orbscope.permanent_deletion')}} </a>
                                                </li>
                                              <li>
                                                    <a href="{{url('admin/restore_trach/invoice/'.$in->id)}}">
                                                        <i class="icon-flag"></i> {{trans('orbscope.recovery')}}

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach(\App\Models\Contract::onlyTrashed()->get() as $in)
                                    <tr class="odd gradeX">

                                        <td width="40%;"> {{trans('orbscope.lease_contract')}}  {{@$in->contract_number}} - {{trans('orbscope.date')}} {{$in->start_date}} </td>

                                        <!--
                                        <td>
                                            <span class="label label-sm label-success"> Approved </span>
                                        </td>-->
                                        <td > {{$in->deleted_at}} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('log.settings')}}
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('admin/delete_trach/contract/'.$in->id)}}">
                                                            <i class="icon-trash"></i> {{trans('orbscope.permanent_deletion')}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('admin/restore_trach/contract/'.$in->id)}}">
                                                            <i class="icon-flag"></i> {{trans('orbscope.recovery')}}

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach(\App\Models\Order::onlyTrashed()->get() as $in)
                                    <tr class="odd gradeX">

                                        <td width="40%;"> {{trans('orbscope.maintenance')}}   {{@$in->unit->name}}   - {{trans('orbscope.date')}} {{$in->created_at->format('y-m-d')}} </td>

                                        <!--
                                        <td>
                                            <span class="label label-sm label-success"> Approved </span>
                                        </td>-->
                                        <td > {{$in->deleted_at}} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('log.settings')}}
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('admin/delete_trach/orders/'.$in->id)}}">
                                                            <i class="icon-trash"></i> {{trans('orbscope.permanent_deletion')}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('admin/restore_trach/orders/'.$in->id)}}">
                                                            <i class="icon-flag"></i> {{trans('orbscope.recovery')}}

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>


@endsection

