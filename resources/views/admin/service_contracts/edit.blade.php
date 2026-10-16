@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('admin/units/'.$edit->unit_id.'/service_contracts')}}">{{trans('orbscope.show-all')}} {{trans('orbscope.service_contracts')}}</a>
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

                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}">
                        </a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">

                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/service_contracts/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach(\App\Models\Unit::all() as $unit)
                                            <option value="{{$unit->id}}" {{$edit->unit_id==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.company')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input type="text" value="{{$edit->company_name}}"   name="company_name" required class="form-control" placeholder="">

                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="contract_value">{{trans('orbscope.contract_value')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input type="number"  step="any" value="{{$edit->amount}}"  name="amount" required class="form-control" >

                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.service_type')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input type="text" value="{{$edit->service_type}}"   name="service_type" required class="form-control" placeholder="">

                                </div>

                            </div>


                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.start_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',$edit->start_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.end_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('end_date',$edit->end_date,['class'=>'form-control date-picker','id'=>'end_date','data-date-format'=>'yyyy-mm-dd']) !!}

                                </div>
                            </div>








                        </div>
                        <div class="form-actions right1">
                            <button type="submit" class="btn green">{{trans('orbscope.edit')}}</button>
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


<script>



</script>

@endsection
