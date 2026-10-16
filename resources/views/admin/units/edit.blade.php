@extends(AdminCore())
@section('content')
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.units')}}">
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

                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/units/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">



                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    {!! Form::text('name',$edit->name,['class'=>'form-control','id'=>'name','placeholder'=>trans('orbscope.name'),'required'=>'required']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                                <label class="col-md-2 control-label" for="unit_type">{{trans('orbscope.unit_type')}} </label>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="unit_type" id="unit_type" data-placeholder="{{trans('orbscope.unitTypes')}}">
                                        <option></option>
                                        @foreach($unit_types as $unit_type)
                                            <option value="{{$unit_type->id}}" {{$edit->unittype_id==$unit_type->id?'selected':''}}>{{$unit_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="developer_id">{{trans('orbscope.owner')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="owner_id" id="owner_id" data-placeholder="ماللك العقار ">
                                        <option></option>
                                        @foreach($developers as $developer)
                                            <option value="{{$developer->id}}" {{$edit->owner_id==$developer->id?'selected':''}} >{{$developer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="uses">{{trans('orbscope.uses')}}  </label>
                                <div class="col-md-4">
                                    <select class="form-control select2"  name="uses" id="uses" multiple>
                                        <option value=""></option>

                                        <option value="commercial" @foreach(explode('|',$edit->uses) as  $us) {{$us == 'commercial'?'selected':''}} @endforeach  >{{trans('orbscope.commercial')}}</option>
                                        <option value="investment" @foreach(explode('|',$edit->uses) as  $us) {{$us == 'investment'?'selected':''}} @endforeach >{{trans('orbscope.investment')}}</option>
                                        <option value="residential" {@foreach(explode('|',$edit->uses) as  $us) {{$us == 'residential'?'selected':''}} @endforeach >{{trans('orbscope.residential')}}</option>
                                        <option value="families" @foreach(explode('|',$edit->uses) as  $us) {{$us == 'families'?'selected':''}} @endforeach >{{trans('orbscope.families')}}</option>
                                        <option value="singels" @foreach(explode('|',$edit->uses) as  $us) {{$us == 'singels'?'selected':''}} @endforeach >{{trans('orbscope.singels')}}</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="country_id">{{trans('orbscope.city')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <select class="form-control select2"  name="city_id" id="city" data-placeholder="{{trans('orbscope.city')}}">
                                        <option></option>
                                        @foreach($cities as $country)
                                            <option {{$edit->city_id==$country->id?'selected':''}}  value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="ar_address">{{trans('orbscope.hood')}} </label>

                                <div class="col-md-4 hood_data">
                                    <select class="form-control" required name="hood_id" id="hood_id" >

                                        <option value=""></option>
                                        @foreach(\App\Models\Hood::all() as $ho)
                                        <option {{$edit->hood_id==$ho->id?'selected':''}} value="{{$ho->id}}">{{$ho->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bathrooms">{{trans('orbscope.aquarium_number')}}</label>
                                <div class="col-md-4">
                                    <input type="text"   name="extra_number" id="extra_number"
                                           class="form-control" value="{{$edit->extra_number}}"></div>
                                <label class="col-md-2 control-label" for="uses">{{trans('orbscope.piece_number')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="postal_code" id="postal_code"
                                           class="form-control" value="{{$edit->postal_code}}">
                                </div>

                            </div>


                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="uses">{{trans('orbscope.guard')}}</label>
                                <div class="col-md-4">
                                    <select class="form-control"  name="guard_id" id="guard_id" >
                                        <option value=""></option>
                                        @foreach(\App\Models\User::where('type','guard')->get() as $g)
                                        <option value="{{$g->id}}" {{$edit->guard_id==$g->id?'selected':''}} >{{$g->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-2 control-label" for="number_floors">{{trans('orbscope.number_floors')}} </label>
                                <div class="col-md-4">
                                    <select class="form-control"  name="floors_number" id="uses" >
                                        @for($x=1; $x<32; $x++)
                                            <option value="{{$x}}" {{$edit->floors_number==$x?'selected':''}} >{{$x}}</option>
                                        @endfor

                                    </select>
                                </div>
                            </div>




                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="building_number">{{trans('orbscope.building_number')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="building_number" id="building_number"
                                           class="form-control" value="{{$edit->building_number}}"></div>

                                <label class="col-md-2 control-label" for="deed_number">{{trans('orbscope.deed_number')}}</label>
                                <div class="col-md-4">
                                    <input type="text"  name="deed_number" id="deed_number"
                                           class="form-control" value="{{$edit->deed_number}}"></div>
                            </div>


                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="building_number">{{trans('orbscope.main_meter')}}</label>
                                <div class="col-md-4">
                                    <input @if ($errors->has('water_meter')) style="border-color: #e73d4a" @endif  placeholder=""  type="text"  name="water_meter" id="water_meter"
                                           class="form-control" value="{{$edit->water_meter}}">
                                    @if ($errors->has('water_meter'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('water_meter') }}</strong>
                                                        </span>
                                    @endif
                                </div>



                                <label class="col-md-2 control-label" for="deed_number">walmaa</label>
                                <div class="col-md-4">
                                    <input @if ($errors->has('electric_meter')) style="border-color: #e73d4a" @endif   type="text"  name="electric_meter" id="electric_meter"
                                           class="form-control" value="{{$edit->electric_meter}}">

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
                                    {!! Form::text('sewage_meter',$edit->sewage_meter,['class'=>'form-control','id'=>'name','placeholder'=>'']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                                <label class="col-md-2 control-label" for="address">{{trans('orbscope.address')}}</label>
                                <div class="col-md-4">
                                    <input  class="form-control" type="text" required value="{{$edit->address}}" id="address" name="address">
                                </div>
                            </div>


                            <div class="col-md-12" style="margin-bottom: 30px;">
                                <div id="google-maps" style="width:100%;height:450px;"></div>
                                <input type="hidden" name="latitude" value="{{$edit->latitude}}" id="lat">
                                <input type="hidden" name="longitude" value="{{$edit->longitude}}" id="lng">
                                <input type="hidden" name="zoom" value="{{$edit->zoom}}" id="zoom">
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="images">{{trans('orbscope.attachments')}} </label>
                                <div class="col-md-10">
                                    @php
                                        if($edit->files != ''){
                                            $images = explode('|',$edit->files);
                                        }else{
                                            $images = null;
                                        }
                                    @endphp
                                    <input type="file" multiple name="images[]" class="form-control" accept=".image/jpeg,.png,.jpg,.bmp,.gif" >
                                    @if($images != null)
                                        <div style="margin-bottom: 20px;margin-top: 20px">
                                            <table class="table-scrollable" style="border: none;">
                                                @foreach($images as $image)
                                                    <tr style="height: 50px;">
                                                        <input type="hidden" name="oldImages[]" value="{{$image}}">
                                                        <th> <i class="fa {{getTypeFile(getEx($image))['fileIcon']}}" aria-hidden="true"></i></th>
                                                        <th>{{$image}}</th>
                                                        <th style="width: 20%;"> <a  href="{{url('uploads/'.$image)}}" style="margin: 3px;" >
                                                                {{trans('orbscope.view')}}
                                                            </a></th>
                                                        <th><span class="btn-sm removeImage" style="color: red"><i class="fa fa-trash-o" style="color: #d20000; font-size: 15px; cursor: pointer;"></i></span></th>
                                                    </tr>
                                                @endforeach

                                            </table>

                                        </div>
                                    @endif
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


    <

    <script>

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
    </script>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMzgB9RquJ2oWhdZGO8y_x6KP0GDRV48I&libraries=places" type="text/javascript"></script>

    <script>
        var latt = $('#lat').val();
        var lngg = $('#lng').val();
        //        alert(zoomm);
        var editLocation = new google.maps.LatLng(latt, lngg);
        var maps = new google.maps.Map(document.getElementById('google-maps'),{
            center:editLocation,
            zoom: {{$edit->zoom}}
        });

        var marker = new google.maps.Marker({
            position : editLocation,
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
        });
        google.maps.event.addListener(maps,'zoom_changed', function() {
            var zoom = maps.getZoom();
            $("#zoom").val(zoom);
        });



    </script>






@endsection
