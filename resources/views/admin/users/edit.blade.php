@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/css/multi-select{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/jquery.quicksearch.js" type="text/javascript"></script>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/users')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.users')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="col-md-12">
                        {!! Form::open(['files'=>true, 'url' =>AdminPath().'/users/'.$edit->id,'method' => 'PUT','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('name',$edit->name,['class'=>'form-control','id'=>'name','placeholder'=>trans('orbscope.name'),'required'=>'required']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                                <label class="col-md-2 control-label" for="email">{{trans('orbscope.email')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::email('email',$edit->email,['class'=>'form-control','id'=>'email','placeholder'=>trans('orbscope.email')]) !!}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="password">{{trans('orbscope.password')}}</label>
                                <div class="col-md-4">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{trans('orbscope.password')}}">
                                </div>
                                <label class="col-md-2 control-label" for="phone">{{trans('orbscope.phone')}} <span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    {!! Form::number('phone',$edit->phone,['class'=>'form-control','id'=>'phone','required'=>'required']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                            </div>

                        </div>
                        <div class='form-group'>
                            <label class="col-md-2 control-label">{{ trans('orbscope.assign_rolles') }}</label>
                            <div class="col-md-10">
                                @foreach ($roles as $role)
                                    <span style="margin-right: 3px">
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}" {{ in_array($role->id, $edit->roles->pluck('id')->toArray()) ? ' checked' : '' }} />
                                        {{ Form::label($role->name, ucfirst($role->name)) }}
                                    </span>
                                @endforeach
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


@endsection
