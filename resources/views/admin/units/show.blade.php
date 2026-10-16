@extends(AdminCore())
@section('content')
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units/create')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.add')}}  {{trans('orbscope.units')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ url(AdminPath().'/units/'.$show->id.'/edit')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.edit')}}  {{trans('orbscope.units')}}">
                            <i class="fa fa-edit"></i>
                        </a>

                        <span data-toggle="tooltip" title="{{trans('orbscope.delete')}}  {{trans('orbscope.units')}}">

                        <a data-toggle="modal" data-target="#myModal{{$show->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


                        <div class="modal fade" id="myModal{{$show->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{trans('orbscope.delete')}} {{ $show->name}} !</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{trans('orbscope.ask-delete')}}  {{ $show->name }} !
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([
                                       'method' => 'DELETE',
                                       'route' => ['units.destroy', $show->id]
                                       ]) !!}
                                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

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
                <ul class="nav nav-tabs nav-tabs-lg">
                    <li @if(url(AdminPath().'/units/'.$show->id) == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$show->id)}}" >{{trans('orbscope.property_information')}}</a>
                    </li>

                    <li @if(url(AdminPath().'/units/'.@$show->argument->id.'/agreements') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/agreements/'.@$show->argument->id)}}" >{{trans('orbscope.management_agreements')}}  </a>
                    </li>

                    <li @if(url(AdminPath().'/units/'.$show->id.'/flats') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$show->id.'/flats')}}" >{{trans('orbscope.apartments')}}</a>
                    </li>

                    <li @if(url(AdminPath().'/units/'.$show->id.'/lease_contracts') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$show->id.'/lease_contracts')}}" >{{trans('orbscope.lease_contracts')}}</a>
                    </li>
                    <li @if(url(AdminPath().'/units/'.$show->id.'/service_contracts') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$show->id.'/service_contracts')}}" >{{trans('orbscope.service_contracts')}}</a>
                    </li>


                    <!--

                    <li @if(url(AdminPath().'/units/'.$show->id.'/deportation') == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/units/'.$show->id.'/deportation')}}" >{{trans('orbscope.financial_report')}}  </a>
                    </li>--->


                </ul>
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        <div class="row">

                            <br>
                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.name')}} : </strong>
                                    {{$show->name}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.unit_type')}} : </strong>
                                    {{@$show->unit_type->name}}
                                    <br><hr>
                                </div>



                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.owner')}} : </strong>
                                        <a href="{{url(AdminUrl('customer/'.@$show->owner_id))}}"> {{@$show->owner->name}} </a>
                                    <br><hr>
                                </div>
                                @if($show->uses != null)
                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.uses')}} : </strong>
                                    @foreach(explode('|',$show->uses) as  $us)
                                        {{trans('orbscope.'.$us)}}
                                    @endforeach
                                    <br><hr>
                                </div>
                                @endif

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.city')}} : </strong>
                                    {{@$show->city->name}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.hood')}} : </strong>
                                    {{@$show->hood->name}}
                                    <br><hr>
                                </div>



                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.piece_number')}} : </strong>
                                    {{$show->postal_code}}
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.aquarium_number')}}</strong>
                                    {{$show->extra_number}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.number_floors')}} : </strong>
                                    {{$show->floors_number}}
                                    <br><hr>
                                </div>

                                @foreach(\App\Models\Flat_type::all() as $f)
                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.count')}} {{$f->name}} : </strong>
                                    <br>
                                        {{@\App\Models\Flat::where('unit_id',$show->id)->where('flat_type_id',$f->id)->count()}}
                                    <hr>
                                </div>
                                @endforeach

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.building_number')}} : </strong>
                                    {{$show->building_number}}
                                    <br><hr>
                                </div>




                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.deed_number')}} : </strong>
                                    {{$show->deed_number}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.main_meter')}} : </strong>
                                    {{$show->water_meter}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>walmaa : </strong>
                                    {{$show->electric_meter}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.sewage_meter')}} : </strong>
                                    {{$show->sewage_meter}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.guard')}} : </strong>
                                    {{@$show->guard_persson->name}}
                                    <br><hr>
                                </div>
                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.address')}} : </strong>
                                    {{$show->address}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.location_number')}} : </strong>
                                    {{$show->location_number}}
                                    <br><hr>
                                </div>


                                @if($show->files != null)
                                    <div class="col-md-12">
                                        <br/>
                                        <br/>
                                        <div class="card-body" >
                                            <div class="card-title">{{trans('orbscope.attachments')}} </div>
                                            <div class="col-md-12">
                                                <div class="carousel-inner" role="listbox">
                                                    @foreach(explode('|',$show->files) as $key => $image)
                                                        {{getTypeFile(getEx($image))['fileType']}}
                                                        <strong>
                                                            {{trans('orbscope.file')}} : <i class="fa {{getTypeFile(getEx($image))['fileIcon']}}" aria-hidden="true"></i>  {{$image}}
                                                        </strong>

                                                        <a  href="{{url('uploads/'.$image)}}" style="margin: 3px;" class="btn btn-success m-1">
                                                            <i class="fa fa-eye"></i> {{trans('orbscope.view')}}
                                                        </a>
                                                        <br>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="col-md-12">
                                    <div id="google-maps" style="width:100%;height:450px;"></div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMzgB9RquJ2oWhdZGO8y_x6KP0GDRV48I&callback=Function.prototype" type="text/javascript"></script>

    <script>
        var maps = new google.maps.Map(document.getElementById('google-maps'),{
            center:{
                lat: {{$show->latitude}},
                lng: {{$show->longitude}}
            },
            zoom: {{$show->zoom}}
        });

        //var contentString = '<div style="color:green;"><b> {{$show->name}} <b></div>';
        var contentString = '<ul style="font-size:14px;font-weight:600;padding:10px;" class="list-group">'+

            '<li> {{$show->name}} </li> ' +'</ul>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position : {
                lat: {{$show->latitude}},
                lng: {{$show->longitude}}
            },
            map : maps,

        });

        marker.addListener('click', function() {
            infowindow.open(maps, marker);
        });


        google.maps.event.trigger(marker, 'click');

    </script>
@endsection
@section('js')

@endsection
