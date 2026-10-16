@extends(AdminCore())
@section('content')
    <style>
        .datepicker {
            width: fit-content;
        }
    </style>

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
                <div class="portlet-body form">
                    {{-- `address`, `time`, `date`, `store_id`, `client_id`, `total`, `discount`, `net`, `total_plus_tax` --}}
                    <form method="get" action="{{url('admin/checks_reports/show')}}" class="form-horizontal form-row-seperated">
                        <div class="row">

                    <!--
                        <div class="caption">
                            <span class="caption-subject font-green-haze bold uppercase">{{trans('orbscope.financial_report')}} </span>
                        </div>
                        <br/>-->



                        <div class="form-group">
                            <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}</label>

                            <div class="col-md-4">
                                <select class="form-control"  name="unit_id" id="unit_id" >
                                    <option value=""></option>
                                    @foreach($units as $unit)
                                        <option  @if(old('unit_id') == $unit->id) selected @endif  value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.apartment')}}</label>

                            <div class="col-md-4 city_data">
                                <select class="form-control"  name="flat_id" id="flat_id" >
                                    <option value=""></option>


                                </select>
                            </div>
                        </div>

                        <div class="form-group " >
                            <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.user')}}</label>

                            <div class="col-md-4 user_data">
                                <select class="form-control"  name="user_id" id="user_id" >
                                    <option value=""></option>
                                    @foreach(\App\Models\User::where('type','user')->get() as $unit)
                                        <option  @if(old('unit_id') == $unit->id) selected @endif  value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <label class="col-md-2 control-label" for="status">{{trans('orbscope.status')}}</label>
                            <div class="col-md-4">
                                <select name="status"  class="form-control">
                                    <option value=""></option>
                                    <option  value="received">{{trans('orbscope.received')}}</option>
                                    <option  value="not_received">{{trans('orbscope.not_received')}}</option>
                                </select>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="date_from">{{trans('orbscope.date_range')}}</label>
                            <div class="col-md-10">
                                <div class="input-group date-picker input-daterange"  data-date-format="yyyy-mm-dd" >
                                    {!! Form::text('date_from',old('date_from'),['class'=>'date-picker form-control','placeholder'=>trans('orbscope.from')]) !!}
                                    <span class="input-group-addon"> {{trans('orbscope.to')}} </span>
                                    {!! Form::text('date_to',old('date_to'),['class'=>'date-picker form-control','placeholder'=>trans('orbscope.to'),'id'=>'date_to']) !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn blue">{{ trans('orbscope.search') }} <i class="fa fa-search"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <hr/>




                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('change', '#unit_id', function () {
            var unit = $(this).val();
            $.ajax({
                url: '{{url(AdminPath().'/checks_ajax')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}', unit: unit},
                beforeSend: function () {

                }, success: function (data) {
                    $('.city_data').html(data);
                }
            });
        });
    </script>
@endsection
