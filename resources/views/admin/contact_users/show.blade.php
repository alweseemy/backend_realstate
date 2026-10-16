@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/css/multi-select{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet"type="text/css"/>
    <div class="page-bar">
        <div class="page-toolbar" style="width: -webkit-fill-available;">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                            </div>
                            <a href="{{ url('admin/contact_users') }}" class="btn green pull-right">{{trans('orbscope.back')}}</a>
                        </div>

                        <div class="portlet-body">

                            <div class="table-toolbar">




                            </div>


                            <form action="{{ url('admin/send/sms') }}" class="form-horizontal form-row-seperated" method="post" >
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">


                                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label" for="callStatus">{{trans('orbscope.messages')}} </label>
                                                <div class="col-md-9">
                                                   <textarea  class="form-control" rows="3" name="message"></textarea>
                                                </div>
                                            </div>




                                </div>
                                    <div class="caption">
                                        <span class="caption-subject bold uppercase font-dark">{{trans('orbscope.customer_chose')}}</span>
                                    </div>
                                    <table class="table table-bordered table-hover" id="myTable">
                                    <thead>
                                    <tr>

                                        <th>{{trans('orbscope.choose')}} </th>
                                        <th>{{trans('orbscope.agent')}}</th>
                                        <th >{{trans('orbscope.type')}}</th>
                                        <th >{{trans('orbscope.phone')}}</th>
                                        <th >{{trans('orbscope.email')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($users as $k=>$us)
                                        <tr class="odd gradeX">


                                            <td> <input type="checkbox" value="{{$us->phone}}" name="type[{{$k}}]"> </td>
                                            <td>{{$us->name}}</td>
                                            <td>{{trans('orbscope.'.$us->type)}}</td>
                                            <td>{{$us->phone}}</td>
                                            <td>{{$us->email}}</td>

                                        </tr>
                                     @endforeach

                                    </tbody>
                                </table>
                                <ul>

                                </ul>


                                    <button  type="submit" class="btn green"> <i class="fa fa-paper-plane" aria-hidden="true"></i> {{trans('orbscope.send')}} </button>

                                </div>

                            </form>


                        </div>

                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>





        </div>
        <!-- Modal -->


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


