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
                <a href="{{url('/admin/units')}}">{{trans('orbscope.units')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units/'.$unit->id.'/flats')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   الوحدات">
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

                        {!! Form::open(['files'=>true,'route'=>'flats.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">
                        <input type="hidden" name="unit_id" value="{{$unit->id}}">


                            <div class="form-group{{ $errors->has('flat_type_id') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="flat_type_id">{{trans('orbscope.flat_type')}} <span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-10">
                                    <select name="flat_type_id" required class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Models\Flat_type::all() as $f)
                                            <option {{old('flat_type_id')==$f->id?'selected':''}} value="{{$f->id}}">{{$f->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="bedrooms">{{trans('orbscope.area')}}</label>
                                <div class="col-md-4">
                                    <input type="number" required name="area" id="area"
                                           class="form-control" value="{{old('area')}}"></div>

                                <label class="col-md-2 control-label" for="bathrooms">{{trans('orbscope.unit_number')}}</label>
                                <div class="col-md-4">
                                    <input type="text" required  name="unit_number" id="unit_number"
                                           class="form-control" value="{{old('unit_number')}}"></div>
                            </div>


                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="electric">{{trans('orbscope.electric_meter')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="electric" id="electric"
                                           class="form-control" value="{{old('electric')}}"></div>

                                <label class="col-md-2 control-label" for="water">{{trans('orbscope.water_meter')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="water" id="water"
                                           class="form-control" value="{{old('water')}}"></div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="room">{{trans('orbscope.bedrooms')}}</label>
                                <div class="col-md-4">
                                    <input type="number"  name="room" id="room"
                                           class="form-control" value="{{old('room')}}"></div>

                                <label class="col-md-2 control-label" for="hall">{{trans('orbscope.hall')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="hall" id="hall"
                                           class="form-control" value="{{old('hall')}}"></div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="hall">{{trans('orbscope.floor')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="floor" id="floor"
                                           class="form-control" value="{{old('floor')}}">
                                </div>
                                <label class="col-md-2 control-label" for="pdf">{{trans('orbscope.images')}} </label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="images[]" id="multiUp" accept=".image/jpeg,.png,.jpg,.bmp,.gif" multiple>
                                </div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="bathroom">{{trans('orbscope.bathrooms')}}</label>
                                <div class="col-md-4">
                                    <input type="number"  name="bathroom" id="bathroom"
                                           class="form-control" value="{{old('bathroom')}}"></div>

                                <label class="col-md-2 control-label" for="balcony">{{trans('orbscope.balcony')}} </label>
                                <div class="col-md-4">
                                    <select name="balcony" class="form-control">
                                        <option value=""></option>
                                        <option value="available" >{{trans('orbscope.available')}}</option>
                                        <option value="unavailable" >{{trans('orbscope.unavailable')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.sewage_meter')}} </label>

                                <div class="col-md-4">
                                    {!! Form::text('sewage_meter',old('sewage_meter'),['class'=>'form-control','id'=>'name','placeholder'=>'']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                                <label class="col-md-2 control-label" for="hall">{{trans('orbscope.services')}}</label>
                                <div class="col-md-4">
                                    <div class="mt-checkbox-list">
                                        @foreach(\App\Models\Service::all() as $s)
                                            <label class="mt-checkbox">
                                                <input value="{{$s->id}}"  name="services[]" type="checkbox">{{$s->title}}
                                                <span></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>







                        </div>
                        </div>
                    <div class="form-actions right1">
                        <button type="submit" name="action" value="save"  class="btn green">{{trans('orbscope.add')}}</button>
                        <button type="submit" name="action" value="another"  class="btn green">اضافة وحدة اخري</button>
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
