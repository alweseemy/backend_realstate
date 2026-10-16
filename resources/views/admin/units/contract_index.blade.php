@extends(AdminCore())
@section('css')
    <link rel="stylesheet" href="{{url('orbscope/admin')}}/datatables/dataTables.bootstrap{{GetLangAdds()}}.css">
    <style>
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            position: unset !important;

        }
        .datepicker{

            width: fit-content;
        }
    </style>

@endsection
@section('content')
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('vendor/datatables/buttons.server-side.js')}}"></script>

    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>{{$title}}</span>
            </li>
        </ul>

    </div>

    <div class='row'>
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title" >
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-icon-only green" style="float: {{GetLanguage()=='ar'?'left':'right'}};">
                        <i class="fa fa-backward"></i>
                    </a>
                </div>



                <ul class="nav nav-tabs nav-tabs-lg">
                    <li @if(url(AdminPath().'/units/'.$leads->id) == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$leads->id)}}" >{{trans('orbscope.property_information')}}</a>
                    </li>

                    <li @if(url(AdminPath().'/units/'.@$leads->argument->id.'/agreements') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/agreements/'.@$leads->argument->id)}}" >{{trans('orbscope.management_agreements')}}  </a>
                    </li>

                    <li @if(url(AdminPath().'/units/'.$leads->id.'/flats') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$leads->id.'/flats')}}" >{{trans('orbscope.apartments')}}</a>
                    </li>

                    <li @if(url(AdminPath().'/units/'.$leads->id.'/lease_contracts') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$leads->id.'/lease_contracts')}}" >{{trans('orbscope.lease_contracts')}}</a>
                    </li>
                    <li @if(url(AdminPath().'/units/'.$leads->id.'/service_contracts') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$leads->id.'/service_contracts')}}" >{{trans('orbscope.service_contracts')}}</a>
                    </li>
                <!--
                    <li @if(url(AdminPath().'/units/'.$leads->id.'/deportation') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$leads->id.'/deportation')}}" >{{trans('orbscope.financial_report')}}  </a>
                    </li>-->


                </ul>

                <div class="portlet-body" style="margin-top: 60px;">


                    {!! Form::open([
                       'method' => 'post',
                       'url' => [AdminPath().'/contracts/multi_delete']
                       ]) !!}
                    {!! $dataTable->table(['class'=> 'table table-striped table-bordered table-hover'],true) !!}


                </div>
            </div>
        </div>
        <script>

            $(document).on('click', '.createBtn', function() {
                window.location = "{{url('admin/contracts/create')}}";
            });
            $(document).on('click', '.deleteBtn', function() {
                $('#multi_delete').modal('show');
                var number_checkbox = $(".selected_data").filter(":checked").length;
                $('#count').html(number_checkbox);
                if(number_checkbox > 0){
                    $('.delete_done').show();
                    $('.check_delete').hide();
                }else{
                    $('.delete_done').hide();
                    $('.check_delete').show();
                }
            });
        </script>

        <div class="modal fade" id="multi_delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">x</button>
                        <h4 class="modal-title">{{trans('orbscope.delete')}} </h4>
                    </div>
                    <div class="modal-body">
                        <div class="delete_done"> {{trans('orbscope.ask-delete')}} <span id="count"></span> {{trans('orbscope.record')}} ! </div>
                        <div class="check_delete">{{trans('orbscope.check-delete')}}</div>
                    </div>
                    <div class="modal-footer">

                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger delete_done']) !!}
                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>

                    </div>
                </div>
            </div>
        </div>

    </div>

    {!! $dataTable->scripts() !!}
    {!! Form::close() !!}
@endsection


