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
                <a href="{{url('/admin/units/'.$show->unit_id.'/flats')}}">{{trans('orbscope.show-all')}} {{trans('orbscope.flats')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units/'.$show->unit_id.'/add_flat')}}"
                           data-toggle="tooltip" title="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ url(AdminPath().'/flats/'.$show->id.'/edit')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.edit')}}  ">
                            <i class="fa fa-edit"></i>
                        </a>

                        <span data-toggle="tooltip" title="{{trans('orbscope.delete')}}">

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
                                       'route' => ['flats.destroy', $show->id]
                                       ]) !!}
                                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units/'.$show->unit_id.'/flats')}}"
                           data-toggle="tooltip" title="">
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
                    <li @if(url(AdminPath().'/flats/'.$show->id) == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/flats/'.$show->id)}}" >{{trans('orbscope.info')}} {{trans('orbscope.apartment')}}</a>
                    </li>

                    <!--

                    <li>
                        <a href="{{url(AdminPath().'/units/'.$show->unit_id)}}" >العقار </a>
                    </li>-->

                    <li>
                        <a href="{{url(AdminPath().'/units/'.$show->unit_id.'/flats')}}" >{{trans('orbscope.apartments')}} </a>
                    </li>


                </ul>
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        <div class="row">

                            <br>
                            <div class="col-md-12">





                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.unit')}} : </strong>
                                        <a href="{{url(AdminUrl('Units/'.@$show->unit_id))}}"> {{@$show->unit->name}} </a>
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.flat_type')}} : </strong>
                                    {{$show->flattype->name}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.unit_number')}} : </strong>
                                    {{$show->unit_number}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.area')}} : </strong>
                                    {{$show->area}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.balcony')}} : </strong>
                                    {{trans('orbscope.'.$show->balcony)}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.electric_meter')}} : </strong>
                                    {{$show->electric}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.water_meter')}} : </strong>
                                    {{$show->water}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.sewage_meter')}} : </strong>
                                    {{$show->sewage_meter}}
                                    <br><hr>
                                </div>



                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.bedrooms')}} : </strong>
                                    {{$show->room}}
                                    <br><hr>
                                </div>
                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.hall')}} : </strong>
                                    {{$show->hall}}
                                    <br><hr>
                                </div>
                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.bathrooms')}} : </strong>
                                    {{$show->bathroom}}
                                    <br><hr>
                                </div>
                                <div class="col-md-6">
                                    <strong>  {{trans('orbscope.floor')}} : </strong>
                                    {{$show->floor}}
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong>{{trans('orbscope.services')}} : </strong>
                                    @php
                                        $allServices = '';
                                    @endphp
                                    @foreach($services as $service)
                                        @php
                                            $allServices .=@App\Models\Service::find($service)->title.' -'
                                        @endphp
                                    @endforeach
                                    {{substr($allServices,0,-1)}}
                                    <br><hr>
                                </div>

                                @if ($show->images != null)
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="col-md-2"><strong>{{trans('orbscope.images')}} : </strong></div>
                                        <div class="col-md-10">
                                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width: 50%;">

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                    @foreach(explode('|', $show->images) as $key => $image)
                                                        <div class="item{{ $key == 0 ? ' active' : '' }}">
                                                            <img width="100%" src="{{ShowImage($image)}}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Controls -->
                                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif





                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
