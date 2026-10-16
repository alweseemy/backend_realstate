@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>تعديل الملف الشخصي</span>
            </li>
        </ul>

    </div>
    <div class='row'>
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{trans('orbscope.profile')}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ url(AdminPath().'/ghange_pass') }}" class="form-horizontal form-row-seperated" method="post">
                        {{ csrf_field() }}
                        <div class="row">

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">
                                        {!! Form::text('name',auth()->user()->name,['class'=>'form-control','id'=>'name','placeholder'=>trans('orbscope.name'), 'required']) !!}
                                        <i class="fa fa-spinner fa-spin loading hidden"></i>
                                    </div>

                                <label class="col-md-2 control-label" for="en_name">{{trans('orbscope.password')}} </label>
                                <div class="col-md-4">
                                    <input type="password" name="password" class="form-control" placeholder="{{trans('orbscope.password')}}">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                </div>


                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.email')}} <span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">
                                        {!! Form::email('email',auth()->user()->email,['class'=>'form-control','id'=>'name','placeholder'=>trans('orbscope.email'), 'required']) !!}
                                        <i class="fa fa-spinner fa-spin loading hidden"></i>
                                    </div>
                                    <label class="col-md-2 control-label" for="ar_name">{{trans('orbscope.phone')}} </label>
                                    <div class="col-md-4">
                                        {!! Form::text('phone',auth()->user()->phone,['class'=>'form-control','id'=>'phone','placeholder'=>trans('orbscope.phone')]) !!}
                                        <i class="fa fa-spinner fa-spin loading hidden"></i>
                                    </div>
                                </div>



                            <div class="col-md-12">
                                <div class="form-actions right1">
                                    <button type="submit" class="btn green">تعديل</button>
                                    <a href="{{ url()->previous() }}" class="btn default">الغاء</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>



@endsection
