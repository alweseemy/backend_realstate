@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
            </li>
            <li>
                <span>{{$title}}</span>
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
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-building-o"></i>{{trans('orbscope.units')}} </div>

                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> {{trans('orbscope.name')}} </th>
                                @foreach(\App\Models\Flat_type::all() as $ft)
                                <th> {{$ft->name}}  </th>
                                @endforeach
                                <th> {{trans('orbscope.total_expenses')}} </th>
                                <th> {{trans('orbscope.gross_income')}} </th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($units=\App\Models\Unit::paginate(4) as $k=>$un)
                            <tr>
                                <td> {{$k+1}} </td>
                                <td>{{$un->name}} </td>
                                @foreach(\App\Models\Flat_type::all() as $ft)
                                <td >
                                    <a style="height: 50px;" class="icon-btn">
                                        <span style="padding: 6px;"> {{trans('orbscope.number_units')}}</span>

                                         ({{\App\Models\Flat::where('unit_id',$un->id)->where('flat_type_id',$ft->id)->count()}})
                                    </a>
                                    <a style="height: 50px;background-color: #f8ecf0;" class="icon-btn">
                                        <span style="padding: 6px;"> {{trans('orbscope.notrent')}}</span>

                                        ({{\App\Models\Flat::where('unit_id',$un->id)->where('flat_type_id',$ft->id)->where('status','notrent')->count()}})
                                    </a>



                                </td>
                                @endforeach
                                <td>{{out_comeunit($un->id)}} {{trans('orbscope.aed')}}</td>
                                <td> {{income_unit($un->id)}} {{trans('orbscope.aed')}}</td>


                            </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2">{{trans('orbscope.occupancy_percentage')}} {{trans('orbscope.unit')}}</td>
                                    <td >
                                        <a style="width: auto;" href="javascript:;" class="btn btn-icon-only {{occupancy_percentage($un->id)>50?'green':'red'}}">
                                            {{round(occupancy_percentage($un->id),1)}} %
                                        </a>
                                        </td>
                                    <td colspan="2">{{trans('orbscope.percentage_non_rented_units')}} {{trans('orbscope.unit')}}</td>
                                    <td >
                                        <a style="width: auto;" href="javascript:;" class="btn btn-icon-only {{(100 -occupancy_percentage($un->id))>50?'green':'red'}}">
                                            {{round(100 - occupancy_percentage($un->id),1)}} %
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $units->links() }}
                </div>
            </div>

        </div>
    </div>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>





@endsection
