@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/css/multi-select{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <div class='row'>
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-block alert-info fade in text-center">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <h4 class="alert-heading">{{trans('orbscope.note')}}</h4>
                        <p style="text-align: center;">{{trans('orbscope.line_one_contact')}}</p>
                        <p style="text-align: center;">{{trans('orbscope.line_two_contact')}}</p>

                    </div>
                </div>
                <div class="portlet-body form">
                  <br>
                    <form action="{{ url('/admin/usersContact/search') }}" class="form-horizontal form-row-seperated" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="single_agent_type_id">{{trans('orbscope.unit')}}</label>
                                    <div class="col-md-10">
                                        <select class="form-control select2 agentTypes" name="unit" data-placeholder="{{trans('orbscope.unit')}}">
                                            <option value=""></option>
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="single_agent_type_id">{{trans('orbscope.agents')}}</label>
                                    <div class="col-md-10">
                                        <select class="form-control select2 agentTypes" name="type" data-placeholder="{{trans('orbscope.agents')}}">
                                            <option value=""></option>
                                            <option value="user">{{trans('orbscope.all_users')}}</option>
                                            <option value="owner">{{trans('orbscope.owner')}}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-block blue">{{trans('orbscope.search')}} <i class="fa fa-search"></i></button>
                                </div>
                                <div class="col-md-2">
                                    <button type="reset" class="btn btn-block red">{{trans('orbscope.reset')}} <i class="fa fa-backward"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <script>
        $(document).ready(function() {
            $('select').select2({width: '100%'});
        });
        $(document).on('change', '.agentTypes', function() {
            $.ajax({
                url: '/',
                method: 'get',
                data: {
                    id: $(this).val(),
                },
                success: function (response) {
                    $('#targets').html("");
                    $('#targets').removeClass('hidden');
                    $('#targets').append(response);
                    $('select').select2({width: '100%'});
                }
            });
        });
    </script>
@endsection
