@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/css/multi-select{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <div class='row'>
        <div class="col-md-12">

            <div class="portlet light bordered">
                @include('admin.settings.nav')
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>


                <div class="portlet-body form">
                    <form action="{{ route('settings.edit') }}" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="form-group">

                                    <label class="col-md-2 control-label" for="en_name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">
                                        {!! Form::text('en_name',$show->name,['class'=>'form-control','id'=>'en_name','placeholder'=>trans('orbscope.en-name'), 'required']) !!}
                                        @if ($errors->has('en_name'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('en_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                       <!---
                                        <label class="col-md-2 control-label" for="mobile">اسم المرسل </label>
                                        <div class="col-md-4">
                                            {!! Form::text('sender_name', $show->sender_name, ['class'=>'form-control','id'=>'sender_name','placeholder'=>'اسم المرسل الخاص ب الرسائل']) !!}
                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('sender_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>--->



                            </div>



                            <div class="form-group">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label" for="email">{{trans('orbscope.email')}}</label>
                                    <div class="col-md-4">
                                        {!! Form::email('email', $show->email,['class'=>'form-control','id'=>'email','placeholder'=>trans('orbscope.email')]) !!}
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label class="col-md-2 control-label" for="phone">{{trans('orbscope.phone')}} </label>
                                    <div class="col-md-4">
                                        {!! Form::number('phone',$show->phone,['class'=>'form-control','id'=>'phone','placeholder'=>trans('orbscope.phone')]) !!}
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>





                                <div class="form-group{{ $errors->has('en_description') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label" for="en_description">{{trans('orbscope.terms_conditions')}} EN</label>
                                    <div class="col-md-10">
                                        {!! Form::textarea('en_description',$show->description,['class'=>'form-control','id'=>'en_description','rows'=>'3']) !!}
                                    </div>
                                </div>





                            <div class="form-group">

                                    <label class="col-md-2 control-label" for="logo">{{trans('orbscope.logo')}} </label>
                                    <div class="col-md-4">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="{{ ShowImage($show->logo) }}" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> {{trans('orbscope.select-image')}}</span>
                                                    <span class="fileinput-exists"> {{trans('orbscope.change')}} </span>
                                                    <input type="file" name="logo" id="logo" accept=".image/jpeg,.png,.jpg,.bmp,.gif">
                                                </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{trans('orbscope.remove')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="col-md-2 control-label" for="icon">{{trans('orbscope.icon')}} </label>
                                    <div class="col-md-4">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="{{ ShowImage($show->icon) }}" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> {{trans('orbscope.select-image')}}</span>
                                                    <span class="fileinput-exists"> {{trans('orbscope.change')}} </span>
                                                    <input type="file" name="icon_image" id="icon" accept=".image/jpeg,.png,.jpg,.bmp,.gif,.ico">
                                                </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{trans('orbscope.remove')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                            </div>



                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="keywords">{{trans('orbscope.keywords')}}</label>


                                    <div class="col-md-4">
                                        <input type="text" name="en_keywords" id="en_keywords" placeholder="{{trans('orbscope.keywords')}}" class="form-control" value="{{@VarByLang($show->keywords,'en')}}">
                                    </div>
                                    <label class="col-md-2 control-label" for="session_timeout">{{trans('orbscope.session_timeout')}} ({{trans('orbscope.in_seconds')}})</label>
                                    <div class="col-md-4">
                                        {!! Form::number('session_timeout',$show->session_timeout,['class'=>'form-control','id'=>'session_timeout','placeholder'=>trans('orbscope.session_timeout')]) !!}
                                        @if ($errors->has('session_timeout'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('session_timeout') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>




                            <div class="form-group">

                                <label class="col-md-2 control-label" for="login_color">{{trans('orbscope.login_color')}} </label>
                                <div class="col-md-4">
                                    {!! Form::color('login_color',$show->login_color,['class'=>'form-control','id'=>'login_color','placeholder'=>trans('orbscope.login_color')]) !!}
                                    @if ($errors->has('login_color'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('login_color') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <label class="col-md-2 control-label" for="ar_address">{{trans('orbscope.address')}} </label>


                                <div class="col-md-4">
                                    {!! Form::text('en_address',$show->address,['class'=>'form-control','id'=>'en_address','placeholder'=>trans('orbscope.address')]) !!}
                                    @if ($errors->has('en_name'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('en_address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>



                            <div class="form-group">

                                <label class="col-md-2 control-label" for="facebook">{{trans('orbscope.facebook')}} </label>

                                <div class="col-md-4">
                                    {!! Form::url('facebook',$show->facebook,['class'=>'form-control','id'=>'facebook','placeholder'=>trans('orbscope.facebook')]) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>



                                <label class="col-md-2 control-label" for="facebook">{{trans('orbscope.twitter')}} </label>


                                <div class="col-md-4">
                                    {!! Form::url('twitter',$show->twitter,['class'=>'form-control','id'=>'twitter','placeholder'=>trans('orbscope.twitter')]) !!}
                                    
                                </div>

                            </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" for="googleplus">{{trans('orbscope.instagram')}} </label>

                            <div class="col-md-4">
                                {!! Form::url('googleplus',$show->googleplus,['class'=>'form-control','id'=>'googleplus','placeholder'=>'انستجرام']) !!}
                                <i class="fa fa-spinner fa-spin loading hidden"></i>
                            </div>

                            <label class="col-md-2 control-label" for="googleplus">{{trans('orbscope.linkedin')}} </label>

                            <div class="col-md-4">
                                {!! Form::url('linkedin',$show->linkedin,['class'=>'form-control','id'=>'linkedin','placeholder'=>trans('orbscope.linkedin')]) !!}
                            
                            </div>

                        </div>


                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-actions right1">
                                    <button type="submit" class="btn green">{{trans('orbscope.edit')}}</button>
                                    <a href="{{ url()->previous() }}" class="btn default">{{trans('orbscope.cancel')}}</a>
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
    <script src="{{url('/vendor/ckeditor/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
        $(document).ready(function() {
            $('select').select2({width: '100%'});
        });
        CKEDITOR.replace( 'en_description', {
            toolbar : 'Basic',
            language: 'ar'
        });
        CKEDITOR.replace( 'welcome_message', {
            toolbar : 'Basic',
            language: 'ar'
        });
    </script>

@endsection
