@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
            </li>
        </ul>

    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase font-dark">
                    {{$title}}
                </span>
            </div>

        </div>
        <div class="portlet-body">

            <div class="row widget-row">
                <div class="col-md-3">
                    <!-- BEGIN WIDGET THUMB -->
                    <div     class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                        <h4 class="widget-thumb-heading">{{trans('orbscope.unit_numbers')}}</h4>
                        <div class="widget-thumb-wrap">

                            <div class="widget-thumb-body">
                                <a href="{{url('/admin/units')}}">
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$units_count}}">0</span></a>
                            </div>
                        </div>

                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-3">
                    <!-- BEGIN WIDGET THUMB -->
                    <div     class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                        <h4 class="widget-thumb-heading">{{trans('orbscope.number_rental_units')}}</h4>
                        <div class="widget-thumb-wrap">

                            <div class="widget-thumb-body">
                                <a href="{{url('/admin/contracts')}}">
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$flats_rent}}">0</span></a>
                            </div>
                        </div>

                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-3">
                    <!-- BEGIN WIDGET THUMB -->
                    <div   class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                        <h4 class="widget-thumb-heading">{{trans('orbscope.number_of_units_available')}}</h4>
                        <div class="widget-thumb-wrap">

                            <div class="widget-thumb-body">
                                <a href="{{url('/admin/follow_up')}}">
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$flats_notrent}}">0</span></a>
                            </div>
                        </div>

                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-3">

                    <div    class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                        <h4 class="widget-thumb-heading">{{trans('orbscope.number_tenants')}}</h4>
                        <div class="widget-thumb-wrap">

                            <div class="widget-thumb-body">
                                <a href="{{url('/admin/customer')}}">
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$users_count}}">0</span></a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
                <div class="row widget-row">
                <div class="col-md-3">

                    <div    class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                        <h4 class="widget-thumb-heading">{{trans('orbscope.owners_number')}}</h4>
                        <div class="widget-thumb-wrap">

                            <div class="widget-thumb-body">
                                <a href="{{url('/admin/customer')}}">
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$owner_count}}">0</span></a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-3">

                    <div    class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                        <h4 class="widget-thumb-heading">{{trans('orbscope.total_expenses')}}</h4>
                        <div class="widget-thumb-wrap">
                            <div class="widget-thumb-body">
                                <a href="{{url('/admin/invoice')}}">
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$outcome_amount}}">0 </span></a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-3">

                    <div    class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                        <h4 class="widget-thumb-heading">{{trans('orbscope.gross_income')}}</h4>
                        <div class="widget-thumb-wrap">

                            <div class="widget-thumb-body">
                                <span style="font-size: 27px;" class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$income_amount}}">0 </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">{{trans('orbscope.contracts_expire_month')}}</span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; "><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                                    <ul class="feeds">
                                       @foreach($contract_end as $co)
                                        <li>
                                            <a href="{{url('admin/contracts/'.$co->id)}}">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">   {{trans('orbscope.contract_number')}}{{$co->contract_number}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="width: auto;margin-right: -109px;" class="col2">
                                                    <div  class="date"> {{$co->end_date}} </div>
                                                </div>
                                            </a>
                                        </li>
                                       @endforeach

                                    </ul>
                                </div><div class="slimScrollBar"></div><div class="slimScrollRail"></div></div>
                            <div class="scroller-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="{{url('admin/contracts')}}"> {{trans('orbscope.show-all')}}  {{trans('orbscope.contracts')}}</a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 col-sm-6">
            <div id="piechart" style="width: auto; height: 500px;"></div>
                </div>
            </div>
                <br/>
             <div class="col-md-12">
                 <h4>{{trans('orbscope.unit_collections_months')}}</h4>
                 <div class="col-md-10 col-sm-6">
                 <div id="columnchart_values" style="width: auto; height: 300px;margin-bottom: 100px;"></div>
                 </div>

             </div>





            </div>
        </div>
    </div>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>


<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            @if(isset($orders['new']))
            ['{{trans('orbscope.new')}}',     {{@$orders['new']->count()}}],
            @endif
            @if(isset($orders['progress']))
            ['{{trans('orbscope.progress')}}',      {{@$orders['progress']->count()}}],
            @endif
            @if(isset($orders['done']))
            ['{{trans('orbscope.done')}}',      {{@$orders['done']->count()}}],
            @endif
            @if(isset($orders['canceled']))
            ['{{trans('orbscope.canceled')}}',      {{@$orders['canceled']->count()}}],
            @endif
        ]);

        var options = {
            title: '{{trans('orbscope.orders')}} {{trans('orbscope.maintenance')}}'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

</script>


    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["الشهر", ""],
                    @if($m!=null)
                    @foreach(json_decode($m) as $n)
                ['{{$n->months}}', {{$n->sums}}],
                    @endforeach
                    @else
                    ['month', 0,
                    @endif

            ]);

            var view = new google.visualization.DataView(data);

            var options = {
                title: "",
                height: 400,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>



@endsection
