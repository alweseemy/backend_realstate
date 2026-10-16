@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('admin/maintenance_form')}}">{{trans('front.maintenance_request_forms')}}</a>
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

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}">
                        </a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>


                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        <div class="row">

                            <br>
                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.name')}} : </strong>
                                    {{$show->name}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.phone')}} : </strong>
                                    {{$show->phone}}
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.unit')}} : </strong>
                                        {{$show->unit}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.apartment')}} : </strong>
                                    {{$show->apartment}}
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.maintenance_type')}}:</strong>
                                    {{@$show->maintenance_type}}
                                    <br><hr>
                                </div>


                                <div class="col-md-12">
                                    <strong> {{trans('orbscope.details')}} :</strong>
                                    {{$show->details}}
                                    <br><hr>
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

@endsection
