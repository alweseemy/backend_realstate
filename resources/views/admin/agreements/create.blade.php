@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css" />

    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/agreements')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   الإتفاقيات">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">

                        {!! Form::open(['files'=>true,'route'=>'agreements.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option {{old('unit_id')==$unit->id?'selected':''}} value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
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



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="fee">{{trans('orbscope.administration_percentage')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">

                                        <input min="1" type="number" name="fee" value="{{old('fee')}}" required class="form-control" placeholder="%">

                                </div>
                                <label class="col-md-2 control-label" for="pdf">{{trans('orbscope.attachments')}}</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="images[]" id="multiUp" accept=".image/jpeg,.png,.jpg,.bmp,.gif" multiple>
                                </div>

                            </div>


                          <!--
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="bank_account">ايبان الحساب البنكي<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-9">
                                    {!! Form::text('bank_account',old('bank_account'),['class'=>'form-control','id'=>'bank_account','required'=>'required']) !!}
                                </div>
                            </div>-->




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
