@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css" />

    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/css/multi-select{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
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
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">

                        {!! Form::open(['files'=>true,'route'=>'service_contracts.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control select2" required name="unit_id[]" id="unit_id" multiple data-placeholder="{{trans('orbscope.unit')}}">
                                        <option value=""></option>
                                        @foreach(\App\Models\Unit::all() as $unit)
                                            <option {{old('unit_id')==$unit->id?'selected':''}} value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>





                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.company')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input type="text" value="{{old('company_name')}}"   name="company_name" required class="form-control" placeholder="">

                                </div>



                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="contract_value">{{trans('orbscope.contract_value')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input type="number"  step="any" value="{{old('amount')}}"  name="amount" required class="form-control" >

                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.service_type')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input type="text" value="{{old('service_type')}}"   name="service_type" required class="form-control" placeholder="">

                                </div>

                            </div>


                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.start_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',old('start_date'),['class'=>'form-control date-picker','id'=>'start_date','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.end_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('end_date',old('end_date'),['class'=>'form-control date-picker','id'=>'end_date','data-date-format'=>'yyyy-mm-dd']) !!}

                                </div>
                            </div>





                        </div>
                        <div class="form-actions right1">
                            <button type="submit" class="btn green">{{trans('orbscope.add')}}</button>
                            <a href="{{ url()->previous() }}" class="btn default">{{trans('orbscope.cancel')}}</a>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
