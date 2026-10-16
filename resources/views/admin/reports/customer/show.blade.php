@extends(AdminCore())
@section('css')
    <link rel="stylesheet" href="{{url('orbscope/admin')}}/datatables/dataTables.bootstrap{{GetLangAdds()}}.css">
    <style>
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            position: unset !important;

        }
    </style>

@endsection
@section('content')
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
                    <a href="{{ url(AdminPath().'/report/customers') }}" class="btn green pull-right">{{ trans('orbscope.back_to_search_page') }}</a>
                </div>
                <div class="portlet-body">
                    <div class="col-xs-12 text-cenetr" style="margin-bottom: 80px">
                        <div class="col-md-6 col-md-offset-3">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-building-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$count}}">{{$count}}</span>
                                    </div>
                                    <div class="desc">{{trans('orbscope.count')}}. {{trans('orbscope.of')}} {{trans('orbscope.Customers')}}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    {!! $dataTable->table(['class'=> 'table table-striped order-column table-bordered table-hover order-column'], true) !!}

                </div>
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}
@endsection
