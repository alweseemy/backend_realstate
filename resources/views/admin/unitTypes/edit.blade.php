@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/settings')}}">{{trans('log.settings')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/unitTypes')}}">{{trans('orbscope.unitTypes')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/unitTypes')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.unitTypes')}}">
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
                <div class="portlet-body form">
                    <div class="col-md-12">

                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/unitTypes/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">

                            <div class="form-group {{ $errors->has('ar_name') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label" for="ar_name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-9">
                                    {!! Form::text('ar_name',$edit->name,['class'=>'form-control','placeholder'=>trans('orbscope.ar-name')]) !!}
                                    @if ($errors->has('ar_name'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('ar_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-actions right1">
                                <button type="submit" class="btn green">{{trans('orbscope.edit')}}</button>
                                <a href="{{ url()->previous() }}" class="btn default">{{trans('orbscope.cancel')}}</a>
                            </div>
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
