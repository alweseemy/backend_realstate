@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/customer')}}">العملاء</a>
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
                        <span data-toggle="tooltip" title="{{trans('orbscope.delete')}}  {{trans('orbscope.customer')}}">
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
                                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['customer.destroy', $show->id] ]) !!}
                                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/customer')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.customer')}}"><i class="fa fa-list"></i></a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ url(AdminPath().'/customer/'.$show->id.'/edit')}}" data-toggle="tooltip" title="{{trans('orbscope.edit')}}  {{trans('orbscope.customer')}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="tabbable-line">
                        <div class="tab-content" lang="en">
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
                                            <strong>{{trans('orbscope.passport_id')}} : </strong>
                                            {{$show->passport_id}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.passport_expiration_date')}} : </strong>
                                            {{$show->passport_expiration_date}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.identy_id')}} : </strong>
                                            {{$show->id_number}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.id_expiration_date')}} : </strong>
                                            {{$show->id_expiration_date}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.phone')}} : </strong>
                                            {{$show->phone}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.type')}} : </strong>
                                            {{trans('orbscope.'.$show->type)}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.nationality')}} : </strong>
                                            {{$show->nationality}}
                                            <br><hr>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>{{trans('orbscope.birth_date')}} : </strong>
                                            {{$show->birth_date}}
                                            <br><hr>
                                        </div>

                                        @if($show->type=='owner')

                                         @foreach(@$show->bankaccont as $b)
                                                <div class="col-md-6">
                                                    <strong>{{@$b->bank->name}} : </strong>
                                                    <br>
                                                   {{$b->bank_account}}
                                                    <hr>
                                                </div>

                                         @endforeach



                                        @endif





                                            @if ($show->id_image != null)

                                                <div class="col-md-12" style="margin-bottom: 30px;">
                                                    <div class="col-md-3"><strong>{{trans('orbscope.identy_id')}} : </strong></div>
                                                    @if(getEx($show->id_image)=='jpg' || getEx($show->id_image)=='png' || getEx($show->id_image)=='jpeg')
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new" >
                                                                <img style="max-width: 400px;" src="{{ShowImage($show->id_image)}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                        <div class="col-md-9">
                                                        {{getTypeFile(getEx($show->id_image))['fileType']}}
                                                        <strong>
                                                            {{trans('orbscope.file')}} : <i class="fa {{getTypeFile(getEx($show->id_image))['fileIcon']}}" aria-hidden="true"></i>  {{$show->id_image}}
                                                        </strong>

                                                        <a  href="{{url('uploads/'.$show->id_image)}}" style="margin: 3px;" class="btn btn-success m-1">
                                                            <i class="fa fa-eye"></i> {{trans('orbscope.view')}}
                                                        </a>
                                                        </div>
                                                    @endif
                                                </div>

                                            @endif



                                        @if ($show->passport_image != null)
                                            <div class="col-md-12">
                                                <div class="col-md-3"><strong>{{trans('orbscope.passport_image')}} : </strong></div>
                                                @if(getEx($show->passport_image)=='jpg' || getEx($show->passport_image)=='png' || getEx($show->passport_image)=='jpeg')
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new" >
                                                                <img style="max-width: 400px;" src="{{ShowImage($show->id_image)}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-9">
                                                        {{getTypeFile(getEx($show->passport_image))['fileType']}}
                                                        <strong>
                                                            {{trans('orbscope.file')}} : <i class="fa {{getTypeFile(getEx($show->passport_image))['fileIcon']}}" aria-hidden="true"></i>  {{$show->passport_image}}
                                                        </strong>

                                                        <a  href="{{url('uploads/'.$show->passport_image)}}" style="margin: 3px;" class="btn btn-success m-1">
                                                            <i class="fa fa-eye"></i> {{trans('orbscope.view')}}
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
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
