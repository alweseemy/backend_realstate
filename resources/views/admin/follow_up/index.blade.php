@extends(AdminCore())
@section('content')

    <link href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet"type="text/css"/>

    <div class="row widget-row">
        <div class="col-md-12">
            <!-- BEGIN WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">{{trans('orbscope.available_units')}}</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-home"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$flats}}">0</span>
                    </div>
                </div>
                <br/>
                <table class="table table-bordered table-hover" id="myTable">
                    <thead>
                    <tr>
                        <th> {{trans('orbscope.unit')}} </th>
                        <th> {{trans('orbscope.apartment')}} </th>
                        <th> {{trans('orbscope.rental')}} </th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach($all_flats as $f)
                        <tr>
                         <td>{{@$f->unit->name}}</td>
                         <td>{{@$f->flattype->name}} {{$f->unit_number}}</td>
                         <td><a href="{{url('/admin/contracts/create')}}">{{trans('orbscope.rental')}} </a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

       <div class="col-md-12">

            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">{{trans('orbscope.checks')}}</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-basket"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">0</span>
                    </div>
                </div>
                <br/>
                <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                    <tr>
                        <th> {{trans('orbscope.user')}} </th>
                        <th> {{trans('orbscope.apartment')}} </th>
                        <th> {{trans('orbscope.bank_receipt_number')}} </th>
                        <th> {{trans('orbscope.bank_name')}} </th>
                        <th> {{trans('orbscope.amount_money')}} </th>
                        <th> {{trans('orbscope.date_range')}} {{trans('orbscope.from')}} </th>
                        <th> {{trans('orbscope.date_range')}} {{trans('orbscope.to')}} </th>
                        <th> {{trans('orbscope.details')}} </th>
                        <th> {{trans('orbscope.status')}} </th>
                        <th> {{trans('orbscope.edit')}} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                       @$conta=\App\Models\Contract::where('status','progress')->select('id')->get();

                      @$checks=\App\Models\Bank_check::whereIn('contract_id',$conta)->whereDate('from_date','<=',date('Y-m-d'))->get();

                    @endphp
                    @foreach(@$checks as $key=>$check)
                        <tr>
                            <td>{{@$check->user->name}}</td>
                            <td>{{@$check->flat->unit_number}}</td>
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

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <!-- BEGIN WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">{{trans('orbscope.maintenance')}}</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$orders}}">0</span>
                    </div>
                </div>
                <br/>
                <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                    <tr>
                        <th> {{trans('orbscope.unit')}} </th>
                        <th> {{trans('orbscope.apartment')}}</th>
                        <th> {{trans('orbscope.maintenance_type')}}</th>
                        <th> {{trans('orbscope.edit')}} </th>
                        <th> {{trans('orbscope.sending_message')}} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_orders as $key=>$v)
                        <tr>
                            <td>{{@$v->unit->name}}</td>
                            <td>{{@$v->flattype->name}} {{$f->unit_number}}</td>
                            <td>{{@$v->type->name}}</td>
                            <td><a href="{{url('admin/orders/'.$v->id.'/edit')}}">{{trans('orbscope.edit')}}</a></td>
                            <td><a href="{{url('/admin/contact_users')}}">{{trans('orbscope.sending_message')}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

    </div>


    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
                "language": {
                    "lengthMenu": "{{trans('orbscope.the_number_results_per_page')}} _MENU_",
                    "zeroRecords": "لا يتوفر اي نتائج",
                    "info": "{{trans('orbscope.start_from')}} _PAGE_ {{trans('orbscope.to')}} _PAGES_",
                    "infoEmpty": "لا يتوفر اي نتائج",
                    "infoFiltered": "(الفلتره from _MAX_ total )",
                    "search": " {{trans('orbscope.search')}} ",
                    "paginate": {
                        "first": "الأول",
                        "previous": "{{trans('orbscope.previous')}}",
                        "next": "{{trans('orbscope.next')}}",
                        "last": "الأخير"
                    },
                    "loadingRecords": "جارٍ التحميل...",
                }
            } );
        } );
    </script>
@endsection



