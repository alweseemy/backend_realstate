@extends(AdminCore())
@section('content')

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
                    <form method="get" action="{{url('admin/financial_report/show')}}">

                       <!--
                        <div class="caption">
                            <span class="caption-subject font-green-haze bold uppercase">{{trans('orbscope.financial_report')}} </span>
                        </div>
                        <br/>-->

                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2">{{trans('orbscope.unit')}}</label>
                            <div class="col-md-10">
                                <select name="unit_id" id=""  required class="form-control  store_id" data-placeholder="{{trans('orbscope.unit')}}" >

                                    <option value=""></option>
                                    @foreach(\App\Models\Unit::all() as $un)
                                        <option value="{{$un->id}}">{{$un->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="date_from">{{trans('orbscope.date_range')}}</label>
                            <div class="col-md-10">
                                <div class="input-group date-picker input-daterange"  data-date-format="yyyy-mm-dd" >
                                    {!! Form::text('date_from',old('date_from'),['class'=>'date-picker form-control','placeholder'=>trans('orbscope.from'),'required'=>'required']) !!}
                                    <span class="input-group-addon"> {{trans('orbscope.to')}} </span>
                                    {!! Form::text('date_to',old('date_to'),['class'=>'date-picker form-control','placeholder'=>trans('orbscope.to'),'required'=>'required','id'=>'date_to']) !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
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
@endsection
