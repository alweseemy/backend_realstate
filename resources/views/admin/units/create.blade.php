@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.units')}}">
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

                        {!! Form::open(['files'=>true,'route'=>'units.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">



                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    {!! Form::text('name',old('name'),['class'=>'form-control','id'=>'name','placeholder'=>'','required'=>'required']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                                <label class="col-md-2 control-label" for="unit_type">{{trans('orbscope.unit_type')}}</label>
                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_type" id="unit_type" data-placeholder="{{trans('orbscope.unitTypes')}}">
                                        <option></option>
                                        @foreach($unit_types as $unit_type)
                                            <option  value="{{$unit_type->id}}" {{old('unit_type') == $unit_type->id ? 'selected' : ''}}>{{$unit_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="country_id">{{trans('orbscope.city')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <select class="form-control"  name="city_id" id="city" data-placeholder="{{trans('orbscope.city')}}">
                                        <option></option>
                                        @foreach($cities as $country)
                                            <option {{old('city_id')==$country->id?'selected':''}}  value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="ar_address">{{trans('orbscope.hood')}} </label>

                                <div class="col-md-4 hood_data">
                                    <select class="form-control" required name="hood_id" id="hood_id" >
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="uses">{{trans('orbscope.uses')}} </label>
                                <div class="col-md-4">
                                    <select class="form-control select2"  name="uses[]" id="uses" multiple data-placeholder="{{trans('orbscope.uses')}}">
                                        <option value=""></option>

                                        <option  {{old('uses')=='commercial'?'selected':''}}  value="commercial">{{trans('orbscope.commercial')}}</option>
                                        <option  {{old('uses')=='investment'?'selected':''}}  value="investment">{{trans('orbscope.investment')}}</option>
                                        <option {{old('uses')=='residential'?'selected':''}} value="residential">{{trans('orbscope.residential')}}</option>
                                        <option  {{old('uses')=='families'?'selected':''}} value="families">{{trans('orbscope.families')}}</option>
                                        <option {{old('uses')=='singels'?'selected':''}} value="singels">{{trans('orbscope.singels')}}</option>

                                    </select>
                                </div>

                                <label class="col-md-2 control-label" for="uses">{{trans('orbscope.number_floors')}} </label>
                                <div class="col-md-4">
                                    <select class="form-control" required name="floors_number" id="uses" >
                                        @for($x=1; $x<32; $x++)
                                            <option {{old('floors_number')==$x?'selected':''}} value="{{$x}}">{{$x}}</option>
                                        @endfor

                                    </select>
                                </div>
                            </div>



                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="bedrooms">{{trans('orbscope.piece_number')}}    </label>
                                <div class="col-md-4">


                                    <input @if ($errors->has('postal_code')) style="border-color: #e73d4a" @endif  placeholder="" type="text"   name="postal_code" id="postal_code"
                                           class="form-control" value="{{old('postal_code')}}">
                                    @if ($errors->has('postal_code'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                        </span>
                                    @endif

                                </div>

                                <label class="col-md-2 control-label" for="aquarium_number">{{trans('orbscope.aquarium_number')}} </label>
                                <div class="col-md-4">
                                    <input @if ($errors->has('extra_number')) style="border-color: #e73d4a" @endif type="text" placeholder=""   name="extra_number" id="extra_number"
                                           class="form-control" value="{{old('extra_number')}}">
                                    @if ($errors->has('extra_number'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('extra_number') }}</strong>
                                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="building_number">{{trans('orbscope.building_number')}}</label>
                                <div class="col-md-4">
                                    <input @if ($errors->has('building_number')) style="border-color: #e73d4a" @endif  placeholder=""  type="text"  name="building_number" id="building_number"
                                           class="form-control" value="{{old('building_number')}}">
                                    @if ($errors->has('building_number'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('building_number') }}</strong>
                                                        </span>
                                    @endif
                                </div>



                                <label class="col-md-2 control-label" for="deed_number">{{trans('orbscope.deed_number')}}</label>
                                <div class="col-md-4">
                                    <input @if ($errors->has('deed_number')) style="border-color: #e73d4a" @endif type="text"  name="deed_number" id="deed_number"
                                           class="form-control" value="{{old('deed_number')}}">

                                    @if ($errors->has('deed_number'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('deed_number') }}</strong>
                                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="building_number">{{trans('orbscope.main_meter')}}</label>
                                <div class="col-md-4">
                                    <input @if ($errors->has('water_meter')) style="border-color: #e73d4a" @endif  placeholder=""  type="text"  name="water_meter" id="water_meter"
                                           class="form-control" value="{{old('water_meter')}}">
                                    @if ($errors->has('water_meter'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('water_meter') }}</strong>
                                                        </span>
                                    @endif
                                </div>



                                <label class="col-md-2 control-label" for="deed_number">walmaa</label>
                                <div class="col-md-4">
                                    <input @if ($errors->has('electric_meter')) style="border-color: #e73d4a" @endif   type="text"  name="electric_meter" id="electric_meter"
                                           class="form-control" value="{{old('electric_meter')}}">

                                    @if ($errors->has('electric_meter'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('electric_meter') }}</strong>
                                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sewage_meter') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.sewage_meter')}} </label>

                                <div class="col-md-4">
                                    {!! Form::text('sewage_meter',old('sewage_meter'),['class'=>'form-control','id'=>'name','placeholder'=>'']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                                <label class="col-md-2 control-label" for="guard_id">{{trans('orbscope.guard')}}</label>
                                <div class="col-md-4">
                                    <select class="form-control" required name="guard_id" id="guard_id" >
                                        <option></option>
                                        @foreach(\App\Models\User::where('type','guard')->get() as $unit_type)
                                            <option  value="{{$unit_type->id}}" {{old('guard_id') == $unit_type->id ? 'selected' : ''}}>{{$unit_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        {{trans('orbscope.unit_details')}}
                                         </div>
                                    <div class="tools">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th> {{trans('orbscope.flat_type')}} </th>
                                                <th> {{trans('orbscope.count')}} </th>
                                                <th> {{trans('orbscope.area')}} </th>
                                                <th> {{trans('orbscope.bathrooms')}} </th>
                                                <th> {{trans('orbscope.bedrooms')}} </th>
                                                <th> {{trans('orbscope.hall')}} </th>
                                                <th> {{trans('orbscope.balcony')}} </th>
                                                <th> x </th>


                                            </tr>
                                            </thead>
                                            <tbody class="new_ine">


                                            @if(old('flat_count')!=null)

                                            @foreach(old('flat_count') as $k=>$v)

                                                <tr>
                                                    <td> <select required class="form-control" name="flat_type[]">
                                                            @foreach(\App\Models\Flat_type::all() as $f)
                                                                <option {{old('flat_type')[$k]==$f->id?'selected':''}} value="{{$f->id}}">{{$f->name}}</option>
                                                            @endforeach
                                                        </select> </td>
                                                    <td> <input type="number" value="{{old('flat_count')[$k]}}" required class="form-control" name="flat_count[]"> </td>
                                                    <td> <input type="number" value="{{old('area')[$k]}}" required class="form-control" step="any" name="area[]"> </td>
                                                    <td> <input type="number" value="{{old('bathrooms')[$k]}}" class="form-control" name="bathrooms[]"> </td>
                                                    <td> <input type="number" value="{{old('bedrooms')[$k]}}" class="form-control" name="bedrooms[]"> </td>
                                                    <td><input type="number" value="{{old('hall')[$k]}}" class="form-control" name="hall[]"> </td>
                                                    <td><select name="balcony" class="form-control">
                                                            <option value=""></option>
                                                            <option value="available" {{old('balcony')[$k]=='available'?'selected':''}}>{{trans('orbscope.available')}}</option>
                                                            <option value="unavailable" {{old('balcony')[$k]=='unavailable'?'selected':''}}>{{trans('orbscope.unavailable')}}</option>
                                                        </select> </td>
                                                    <td style="padding-top: 15px;"></td>
                                                </tr>

                                            @endforeach


                                            @else

                                                <tr>
                                                    <td> <select required class="form-control" name="flat_type[]">
                                                            @foreach(\App\Models\Flat_type::all() as $f)
                                                                <option value="{{$f->id}}">{{$f->name}}</option>
                                                            @endforeach
                                                        </select> </td>
                                                    <td> <input type="number" required class="form-control" name="flat_count[]"> </td>
                                                    <td> <input type="number" required class="form-control" step="any" name="area[]"> </td>
                                                    <td> <input type="number" class="form-control" name="bathrooms[]"> </td>
                                                    <td> <input type="number" class="form-control" name="bedrooms[]"> </td>
                                                    <td><input type="number" class="form-control" name="hall[]"> </td>
                                                    <td>
                                                        <select name="balcony[]" class="form-control">
                                                            <option value=""></option>
                                                            <option value="available" >{{trans('orbscope.available')}}</option>
                                                            <option value="unavailable" >{{trans('orbscope.unavailable')}}</option>
                                                        </select>
                                                    </td>
                                                    <td style="padding-top: 15px;"></td>
                                                </tr>



                                            @endif




                                            </tbody>

                                        </table>
                                        <a id="add_flats"  class="btn btn-icon-only green">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>


                            <div class="form-group">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            {{trans('orbscope.service_contracts')}}
                                        </div>
                                        <div class="tools">

                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th> {{trans('orbscope.company')}} </th>
                                                    <th> {{trans('orbscope.service_type')}} </th>
                                                    <th> {{trans('orbscope.contract_value')}} </th>
                                                    <th> {{trans('orbscope.start_date')}} </th>
                                                    <th> {{trans('orbscope.end_date')}} </th>
                                                    <th> x </th>


                                                </tr>
                                                </thead>
                                                <tbody class="new_service">


                                                @if(old('company_name')!=null)

                                                    @foreach(old('company_name') as $k=>$v)

                                                        <tr>
                                                            <td>  <input type="text" value="{{old('company_name')[$k]}}"  class="form-control" name="company_name[]"> </td>
                                                            <td> <input type="text" value="{{old('service_type')[$k]}}"  class="form-control" name="service_type[]"> </td>
                                                            <td> <input type="number" value="{{old('contract_value')[$k]}}"  class="form-control" step="any" name="contract_value[]"> </td>
                                                            <td>
                                                                {!! Form::text('start_date[]',old('start_date')[$k],['class'=>'form-control','id'=>'start_date','data-date-format'=>'yyyy-mm-dd']) !!}


                                                            </td>
                                                            <td>
                                                                {!! Form::text('end_date[]',old('end_date')[$k],['class'=>'form-control','id'=>'end_date','data-date-format'=>'yyyy-mm-dd']) !!}


                                                            </td>

                                                            <td style="padding-top: 15px;"></td>
                                                        </tr>

                                                    @endforeach


                                                @else

                                                    <tr>
                                                        <td> <input type="text"   class="form-control" name="company_name[]"></td>
                                                        <td> <input type="text"   class="form-control" name="service_type[]"> </td>
                                                        <td> <input type="number"  class="form-control" step="any" name="contract_value[]"> </td>
                                                        <td>
                                                            {!! Form::text('start_date[]','',['class'=>'form-control','id'=>'start_date','data-date-format'=>'yyyy-mm-dd']) !!}


                                                        </td>
                                                        <td>
                                                            {!! Form::text('end_date[]','',['class'=>'form-control','id'=>'end_date','data-date-format'=>'yyyy-mm-dd']) !!}


                                                        </td>

                                                        <td style="padding-top: 15px;"></td>
                                                    </tr>



                                                @endif




                                                </tbody>

                                            </table>
                                            <a id="add_service"  class="btn btn-icon-only green">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="developer_id">{{trans('orbscope.owner')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-10">
                                    <select class="form-control @if(old('add_user')) hidden @endif" name="owner_id" id="user_id" data-placeholder="ماللك العقار ">
                                        <option></option>
                                        @foreach($developers as $developer)
                                            <option {{old('owner_id')==$developer->id?'selected':''}} value="{{$developer->id}}">{{$developer->name}}</option>
                                        @endforeach
                                    </select>
                                    <a id="add_rent" class="@if(old('add_user')) hidden @endif" >{{trans('orbscope.add')}} {{trans('orbscope.owner')}}</a>
                                    <div class="portlet box purple @if(old('add_user')) @else hidden @endif">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i> {{trans('orbscope.add')}} {{trans('orbscope.owner')}}</div>
                                            <div class="tools">
                                                <a id="delete_user" style="color: white;" title="حذف"> <i class="fa fa-trash"></i> {{trans('orbscope.delete')}}</a>

                                            </div>
                                        </div>

                                        <div class="portlet-body form">

                                            <input type="hidden" name="add_user" value="yes" disabled id="input_add">


                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    {!! Form::text('name_user',old('name_user'),['class'=>'form-control','id'=>'name']) !!}
                                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                                </div>
                                                <label class="col-md-2 control-label" for="email">{{trans('orbscope.email')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    <input @if ($errors->has('email')) style="border-color: #e73d4a" @endif class="form-control"  type="email" value="{{ old('email') }}" placeholder="{{trans('orbscope.email')}}" name="email" />
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>


                                          <!---
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label" for="password">{{trans('orbscope.password')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-9">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{trans('orbscope.password')}}">
                                                </div>
                                            </div>--->

                                            <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="name">{{trans('orbscope.identy_id')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    {!! Form::number('id_number',old('id_number'),['class'=>'form-control','id'=>'id_number']) !!}
                                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                                    @if ($errors->has('id_number'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('id_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <label class="col-md-2 control-label" for="passport_id"><span class="required" aria-required="true"> * </span> {{trans('orbscope.passport_id')}} </label>

                                                <div class="col-md-4">
                                                    {!! Form::text('passport_id',old('passport_id'),['class'=>'form-control','id'=>'passport_id']) !!}
                                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                                    @if ($errors->has('passport_id'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('passport_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.id_expiration_date')}}<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-4">
                                                    {!! Form::text('id_expiration_date',old('id_expiration_date'),['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}
                                                </div>
                                                <label class="col-md-2 control-label" for="phone">{{trans('orbscope.passport_expiration_date')}}<span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    {!! Form::text('passport_expiration_date',old('passport_expiration_date'),['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}

                                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                                </div>
                                            </div>


                                        <!---
                                            <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.birth_date')}}</label>
                                                <div class="col-md-4">
                                                    {!! Form::text('birth_date',old('birth_date'),['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}
                                                </div>--->
                                            <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.nationality')}}</label>
                                                <div class="col-md-4">
                                                    {!! Form::text('nationality',old('nationality'),['class'=>'form-control']) !!}
                                                </div>
                                                <label class="col-md-2 control-label" for="phone">{{trans('orbscope.phone')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    <input @if ($errors->has('phone')) style="border-color: #e73d4a" @endif class="form-control"  type="number" value="{{ old('phone') }}" placeholder="{{trans('orbscope.phone')}}" name="phone" />

                                                @if ($errors->has('phone'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('id_image',trans('orbscope.id_image'),['class'=>'col-md-2 control-label','for'=>'id_image']) !!}
                                                <div class="col-md-4">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;">
                                                        </div>
                                                        <div>
                                                                    <span class="btn default btn-file">
                                                                         <span class="fileinput-new"> {{trans('orbscope.select-image')}}</span>
                                                                         <span class="fileinput-exists"> {{trans('orbscope.change')}} </span>
                                                                         <input type="file" name="id_image" id="logo" accept=".image/jpeg,.png,.jpg,.bmp,.gif">
                                                                    </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
                                                               data-dismiss="fileinput"> {{trans('orbscope.remove')}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::label('id_image',trans('orbscope.passport_image'),['class'=>'col-md-2 control-label','for'=>'passport_image']) !!}

                                                <div class="col-md-4">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;">
                                                        </div>
                                                        <div>
                                                                    <span class="btn default btn-file">
                                                                         <span class="fileinput-new"> {{trans('orbscope.select-image')}}</span>
                                                                         <span class="fileinput-exists"> {{trans('orbscope.change')}} </span>
                                                                         <input type="file" name="passport_image" id="passport_image" accept=".image/jpeg,.png,.jpg,.bmp,.gif">
                                                                    </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
                                                               data-dismiss="fileinput"> {{trans('orbscope.remove')}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>






                                        </div>
                                    </div>
                                </div>



                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="pdf">{{trans('orbscope.attachments')}} </label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="images[]" id="multiUp"  multiple>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="address">{{trans('orbscope.address')}}</label>
                                <div class="col-md-4">
                                <input  class="form-control" type="text" required value="{{old('address')}}" id="address" name="address">
                                </div>
                                <label class="col-md-2 control-label" for="address">{{trans('orbscope.location_number')}}</label>
                                <div class="col-md-4">
                                    <input  class="form-control" type="text"  value="{{old('location_number')}}" id="location_number" name="location_number">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div id="google-maps" style="width:100%;height:450px;"></div>
                                <input type="hidden" name="latitude" value="{{old('latitude')}}" id="lat">
                                <input type="hidden" name="longitude" value="{{old('longitude')}}" id="lng">
                                <input type="hidden" name="zoom" value="{{old('zoom')}}" id="zoom">
                            </div>

                            </div>









<!--
                        <div class="portlet light " style="background-color: #f3f3f09e;">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <span class="caption-subject font-green-sharp bold uppercase">اتفاقية إدارة العقار</span>
                                </div>

                            </div>
                            <div class="portlet-body util-btn-margin-bottom-5">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="month">مدة العقد<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">

                                            <input min="1" type="number" value="{{old('month')}}" name="month"  class="form-control" placeholder="المدة بالسنة">

                                    </div>
                                    <label class="col-md-2 control-label" for="fee">نسبة الادارة المقتطعة<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">

                                            <input min="1" type="number" name="fee" value="{{old('fee')}}" required class="form-control" placeholder="%">

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="pdf">صور العقار عند الاستلام </label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control" name="images[]" id="multiUp" accept=".image/jpeg,.png,.jpg,.bmp,.gif" multiple>
                                    </div>
                                </div>


                            </div>
                        </div>-->

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
    <script>
        $(document).on('click', '#add_rent', function () {

            $('.purple').removeClass('hidden');
            $('#user_id').addClass('hidden');
            $('#input_add').removeAttr('disabled');
            $('#add_rent').addClass('hidden');


        });
        @if(old('add_user'))

        $('.purple').removeClass('hidden');
        $('#user_id').addClass('hidden');
        $('#input_add').removeAttr('disabled');
        $('#add_rent').addClass('hidden');

        @endif
        $(document).on('click', '#delete_user', function () {

            $('.purple').addClass('hidden');
            $('#user_id').removeClass('hidden');
            $('#add_rent').removeClass('hidden');
            $('#input_add').attr('disabled', true); ;


        });
//unites_number
        $('#unites_number').on('keyup',function () {
            var counts = $('#unites_number').val();
            $.ajax({
                url:'{{url(AdminPath().'/units/add_flats')}}',
                dataType:'html',
                type:'post',
                data:{counts:counts,_token:'{{csrf_token()}}'},
                beforeSend: function()
                {
                    $('.city_data').removeClass('hidden');
                },success: function(data)
                {
                    $('.others_names_container').html(data);
                }
            });
        });

        @if(old('city_id'))
        var city_id  = $('#city option:selected').val();
        var hood_id     = $('#hood_id option:selected').val();
        $.ajax({
            url:'{{url(AdminPath().'/units/city/ajax')}}',
            dataType:'html',
            type:'post',
            data:{_token:'{{csrf_token()}}',city_id:city_id,hood_id:hood_id},
            beforeSend: function()
            {

            },success: function(data)
            {
                $('.hood_data').html(data);
                $('select[name="hood_id"]').val("{{old('hood_id')}}");
            }
        });
        @endif

        $(document).on('change', '#city', function () {
            var city_id = $(this).val();
            $.ajax({
                url: '{{url(AdminPath().'/units/city/ajax')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}', city_id: city_id},
                beforeSend: function () {

                }, success: function (data) {
                    $('.hood_data').html(data);
                }
            });
        });
        $(document).on('click', '#add_flats', function () {

            $.ajax({
                url: '{{url(AdminPath().'/units/add/new_flat')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}'},
                beforeSend: function () {

                }, success: function (data) {
                    $('.new_ine').append(data);
                }
            });
        });

        $(document).on('click', '#add_service', function () {

            $.ajax({
                url: '{{url(AdminPath().'/units/add_service')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}'},
                beforeSend: function () {

                }, success: function (data) {
                    $('.new_service').append(data);
                }
            });
        });





    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMzgB9RquJ2oWhdZGO8y_x6KP0GDRV48I&libraries=places" type="text/javascript"></script>

    <script>
        var maps = new google.maps.Map(document.getElementById('google-maps'),{
            center:{
                lat: 24.1302,
                lng: 55.8023
            },
            zoom: 8
        });

        var marker = new google.maps.Marker({
            position : {
                lat: {{old('latitude')!=null? old('latitude') :'24.1302'}},
                lng: {{old('longitude')!=null?old('longitude') :'55.8023'}}
            },
            map : maps,
            draggable : true

        });

        var search_ar = new google.maps.places.SearchBox(document.getElementById('address'));

        google.maps.event.addListener(search_ar,'places_changed',function(){
            var places = search_ar.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            maps.fitBounds(bounds);
            maps.setZoom(8);
        });



        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $("#lat").val(lat);
            $("#lng").val(lng);
            /*
             var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat+','+lng + "&sensor=false&key=AIzaSyAMzgB9RquJ2oWhdZGO8y_x6KP0GDRV48I";
             $.getJSON(url, function (data) {

             for(var i=0;i<data.results.length;i++) {
             var adress = data.results[i].formatted_address;
             console.log(adress);
             }
             });
             */
        });

        google.maps.event.addListener(maps,'zoom_changed', function() {
            var zoom = maps.getZoom();
            $("#zoom").val(zoom);
        });



    </script>

@endsection
