@extends(AdminCore())
@section('content')
    <style>
        .dashboard-stat .details {
            position: unset;
            left: 15px;
            /* padding-left: 15px; */
        }
    </style>
    <link rel="stylesheet" href="{{url('orbscope/admin')}}/datatables/dataTables.bootstrap{{GetLangAdds()}}.css">
    <script src="{{url('orbscope/admin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('orbscope/admin/assets/global/plugins/counterup/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('orbscope/admin/assets/global/plugins/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{url('orbscope/admin/assets/pages/scripts/table-datatables-scroller.min.js')}}" type="text/javascript"></script>
    <script src="{{url('vendor/datatables/buttons.server-side.js')}}"></script>
    <div class='row'>
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <a href="{{ url(AdminPath().'/checks/reports') }}" class="btn green pull-right">{{ trans('orbscope.back_to_search_page') }}</a>
                </div>

                <div class="portlet-body">
                    <div class="col-xs-12 text-cenetr" style="margin-bottom: 80px">
                        <div class="col-md-6 col-md-offset-3">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="icon-list"></i>
                                </div>
                                <div class="details" style="text-align: center;">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$show->count()}}">{{$show->count()}}</span>
                                    </div>
                                    <div class="desc">{{trans('orbscope.count')}}. {{trans('orbscope.of')}} {{trans('orbscope.checks')}}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> {{trans('orbscope.user')}} </th>
                                <th> {{trans('orbscope.contract')}} </th>
                                <th> {{trans('orbscope.bank_receipt_number')}} </th>
                                <th> {{trans('orbscope.bank_name')}} </th>
                                <th> {{trans('orbscope.amount_money')}} </th>
                                <th> {{trans('orbscope.date_range')}} {{trans('orbscope.from')}} </th>
                                <th> {{trans('orbscope.date_range')}} {{trans('orbscope.to')}} </th>
                                <th> {{trans('orbscope.details')}} </th>
                                <th> {{trans('orbscope.status')}} </th>
                                <th> {{trans('orbscope.edit')}} </th>
                                <th> {{trans('orbscope.delete')}} </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(@$show as $key=>$check)
                                <tr>
                                    <td>{{@$check->user->name}}</td>
                                    <td>{{@$check->contract->contract_number}}</td>
                                    <td>{{$check->number}}</td>
                                    <td>{{@$check->bank->name}}</td>
                                    <td>{{$check->amount}}</td>
                                    <td>{{$check->from_date}}</td>
                                    <td>{{$check->to_date}}</td>
                                    <td>{{$check->details}}</td>
                                    <td>{{trans('orbscope.'.$check->status)}}</td>
                                    <td>
                                        @if($check->status !='received')
                                            <a href="{{url('/admin/checks/'.$check->id.'/edit')}}">{{trans('orbscope.edit')}}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a style="color: red;" href="{{url('/admin/checks/'.$check->id.'/delete')}}">{{trans('orbscope.delete')}}</a>
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

@endsection
