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
                <a href="{{url('admin/agreements')}}">{{trans('orbscope.show-all')}} {{trans('orbscope.management_contracts')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/agreements')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   الاتفاقيات">
                            <i class="fa fa-list"></i>
                        </a>
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

                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/agreements/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" {{$edit->unit_id==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.start_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',$edit->start_date,['class'=>'form-control date-picker','id'=>'start_date','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.end_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('end_date',$edit->end_date,['class'=>'form-control date-picker','id'=>'end_date','data-date-format'=>'yyyy-mm-dd']) !!}

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="fee">{{trans('orbscope.administration_percentage')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-9">


                                        <input type="text" pattern="[0-9]+([,][0-9]{1,2})?" name="fee" value="{{$edit->fee}}" required class="form-control" placeholder="%">

                                </div>

                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label" for="images">{{trans('orbscope.attachments')}} </label>
                                <div class="col-md-9">
                                    @php
                                        if($edit->images != ''){
                                            $images = explode('|',$edit->images);
                                        }else{
                                            $images = null;
                                        }
                                    @endphp
                                    <input type="file" multiple name="images[]" class="form-control" accept=".image/jpeg,.png,.jpg,.bmp,.gif" >
                                    <div style="margin-bottom: 20px;margin-top: 20px">
                                        @if($images != null)
                                            <div class="parent-popup row">
                                                @foreach($images as $image)
                                                    <div class="col-md-2" style="height:100px;">
                                                        <span id="image_span" style="position:relative">
                                                            {{-- <a class="fa fa-trash image" style="color: darkred; position: absolute; font-size: 1.5em; bottom: -7px; text-decoration: none; margin-left: 22px"></a> --}}
                                                            <span class="btn-sm removeImage" style="color: red"><i class="fa fa-trash-o" style="position: absolute; top: 27px; z-index: 1000; right: 3px; color: #d20000; font-size: 15px; cursor: pointer;"></i></span>
                                                            <a class="img" href="{{url('uploads/'.$image)}}">
                                                                <img class="img-responsive img-rounded special-image" style="height: 96px;" src="{{url('uploads/'.$image)}}">
                                                            </a>
                                                            <input type="hidden" name="oldImages[]" value="{{$image}}">
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
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
