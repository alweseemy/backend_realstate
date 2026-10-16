@extends(AdminCore())
@section('content')

    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/users')}}">{{trans('orbscope.users')}}</a>
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
                        <span data-toggle="tooltip" title="{{trans('orbscope.delete')}}  {{trans('orbscope.users')}}">
                            <a data-toggle="modal" data-target="#myModal{{$show->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                                <i class="fa fa-trash"></i>
                            </a>
                        </span>
                        <div class="modal fade" id="myModal{{$show->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{trans('orbscope.delete')}} {{  $show->name }} !</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{trans('orbscope.ask-delete')}}  {{ $show->name }} !
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['users.destroy', $show->id] ]) !!}
                                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/users')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.users')}}"><i class="fa fa-list"></i></a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs nav-tabs-lg">
                            <li @if(url(AdminPath().'/users/'.$show->id) == URL::current()) class="active" @endif>
                                <a href="{{url(AdminPath().'/users/'.$show->id)}}" >{{trans('orbscope.agent_information')}}</a>
                            </li>


                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row static-info">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.name')}} : </strong>
                                            {{$show->name}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.email')}} : </strong>
                                            <a href="mailto:{{$show->email}}">{{$show->email}}</a>
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.phone')}} : </strong>
                                            {{$show->phone}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.type')}} : </strong>
                                            {{$show->type}}
                                            <br><hr>
                                        </div>
                                        @if($show->type=='user')
                                            <div class="col-md-6">
                                                <strong>{{trans('orbscope.customer_type')}} : </strong>
                                                {{trans('orbscope.'.$show->payment)}}
                                                <br><hr>
                                            </div>


                                            <div class="col-md-6">
                                                <strong>{{trans('orbscope.start_date')}}  {{trans('orbscope.subscribe')}}: </strong>
                                                {{$show->start_date}}
                                                <br><hr>
                                            </div>

                                            <div class="col-md-6">
                                                <strong>{{trans('orbscope.end_date')}}  {{trans('orbscope.subscribe')}}: </strong>
                                                {{$show->end_date}}
                                                <br><hr>
                                            </div>



                                        @endif

                                        @if($show->type=='teacher')
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.country')}} : </strong>
                                            {{$show->country}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.address')}} : </strong>
                                            {{$show->address}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.Years_Experience')}} : </strong>
                                            {{$show->years}}
                                            <br><hr>
                                        </div>

                                            @if ($show->cv_file != null)
                                                <div class="col-md-12">
                                                    <div class="col-md-2"><strong>{{trans('orbscope.cv')}} : </strong></div>
                                                    <div class="col-md-10">
                                                        <div class="carousel-inner" role="listbox">
                                                            
                                                                {{getTypeFile(getEx($show->cv_file))['fileType']}}
                                                                <strong>
                                                                    {{trans('orbscope.file')}} : <i class="fa {{getTypeFile(getEx($show->cv_file))['fileIcon']}}" aria-hidden="true"></i>  {{$show->cv_file}}
                                                                </strong>

                                                                <a href="{{url('uploads/'.$show->cv_file)}}" target="_blank" style="margin: 3px;" class="btn btn-large pull-right">
                                                                    <i class="fa fa-eye"></i> {{trans('orbscope.view')}}
                                                                </a>
                                                                <hr>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        @endif
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
