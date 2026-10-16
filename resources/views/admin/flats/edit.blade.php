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
                <a href="{{url('/admin/units')}}">{{trans('orbscope.units')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/units/'.$edit->unit_id.'/flats')}}">{{trans('orbscope.apartments')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units/'.$edit->unit_id.'/flats')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}  ">
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

                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/flats/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">
                            <div class="form-group{{ $errors->has('flat_type_id') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="flat_type_id">{{trans('orbscope.flat_type')}} <span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-10">
                                   <select name="flat_type_id" required class="form-control">
                                       <option value=""></option>
                                       @foreach(\App\Models\Flat_type::all() as $f)
                                       <option {{$edit->flat_type_id==$f->id?'selected':''}} value="{{$f->id}}">{{$f->name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                            </div>

                        <!---
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-10">
                                    {!! Form::text('name',$edit->name,['class'=>'form-control','id'=>'name','placeholder'=>trans('orbscope.name'),'required'=>'required']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                            </div>------>




                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="bedrooms">{{trans('orbscope.area')}}</label>
                                <div class="col-md-4">
                                    <input type="text" pattern="[0-9]+([,][0-9]{1,2})?" required name="area" id="area"
                                           class="form-control" value="{{$edit->area}}"></div>

                                <label class="col-md-2 control-label" for="bathrooms">{{trans('orbscope.unit_number')}}</label>
                                <div class="col-md-4">
                                    <input type="text" required  name="unit_number" id="unit_number"
                                           class="form-control" value="{{$edit->unit_number}}"></div>
                            </div>


                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="electric">{{trans('orbscope.electric_meter')}} </label>
                                <div class="col-md-4">
                                    <input type="text"  name="electric" id="electric"
                                           class="form-control" value="{{$edit->electric}}"></div>

                                <label class="col-md-2 control-label" for="water">{{trans('orbscope.water_meter')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="water" id="water"
                                           class="form-control" value="{{$edit->water}}"></div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="room">{{trans('orbscope.bedrooms')}}</label>
                                <div class="col-md-4">
                                    <input type="text" pattern="[0-9]+([,][0-9]{1,2})?"  name="room" id="room"
                                           class="form-control" value="{{$edit->room}}"></div>

                                <label class="col-md-2 control-label" for="hall">{{trans('orbscope.hall')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="hall" id="hall"
                                           class="form-control" value="{{$edit->hall}}"></div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="bathroom">{{trans('orbscope.bathrooms')}}</label>
                                <div class="col-md-4">
                                    <input type="text" pattern="[0-9]+([,][0-9]{1,2})?"  name="bathroom" id="bathroom"
                                           class="form-control" value="{{$edit->bathroom}}"></div>

                                <label class="col-md-2 control-label" for="floor">{{trans('orbscope.floor')}}</label>
                                <div class="col-md-4">
                                    <input type="text"   name="floor" id="floor"
                                           class="form-control" value="{{$edit->floor}}"></div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="balcony">{{trans('orbscope.balcony')}} </label>
                                <div class="col-md-4">
                                    <select name="balcony" class="form-control">
                                        <option value=""></option>
                                        <option {{$edit->balcony=='available'?'selected':''}} value="available" >{{trans('orbscope.available')}}</option>
                                        <option {{$edit->balcony=='unavailable'?'selected':''}} value="unavailable" >{{trans('orbscope.unavailable')}}</option>
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.sewage_meter')}} </label>

                                <div class="col-md-4">
                                    {!! Form::text('sewage_meter',$edit->sewage_meter,['class'=>'form-control','id'=>'name','placeholder'=>'']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="hall">{{trans('orbscope.services')}}</label>
                                <div class="col-md-4">
                                    <div class="mt-checkbox-list">
                                        @foreach(\App\Models\Service::all() as $s)
                                            <label class="mt-checkbox">
                                                <input  value="{{$s->id}}" @foreach($services as $service) {{$s->id==$service?'checked':''}}  @endforeach  name="services[]" type="checkbox">{{$s->title}}
                                                <span></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="images">{{trans('orbscope.images')}} </label>
                                <div class="col-md-10">
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
        $(document).on('click','.removeImage', function () {
            $(this).parent().parent().remove();
        });
    </script>



@endsection
