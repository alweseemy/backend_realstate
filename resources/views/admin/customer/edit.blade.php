@extends(AdminCore())
@section('content')
    <style>
        .datepicker {
            width: fit-content;
        }
    </style>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/css/multi-select{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/customer')}}">{{trans('orbscope.customers')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/customer')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.customer')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('orbscope.full-screen')}}" title="{{trans('orbscope.full-screen')}}"></a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">
                        {!! Form::open(['files'=>true, 'url' =>AdminPath().'/customer/'.$edit->id,'method' => 'PUT','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('name',$edit->name,['class'=>'form-control','id'=>'name','placeholder'=>trans('orbscope.name'),'required'=>'required']) !!}
                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                </div>
                                <label class="col-md-2 control-label" for="email">{{trans('orbscope.email')}} </label>
                                <div class="col-md-4">
                                    {!! Form::email('email',$edit->email,['class'=>'form-control','id'=>'email','placeholder'=>trans('orbscope.email')]) !!}
                                </div>
                            </div>


                        </div>
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="developer_id">{{trans('orbscope.customer_type')}} <span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-4">
                                <select class="form-control" data-placeholder="نوع العميل"  required id="type" name="type">
                                    <option value=""></option>
                                    <option {{$edit->type=='user'?'selected':''}} value="user">{{trans('orbscope.user')}}</option>
                                    <option {{$edit->type=='owner'?'selected':''}} value="owner">{{trans('orbscope.owner')}}</option>
                                    <option {{$edit->type=='guard'?'selected':''}} value="guard">{{trans('orbscope.guard')}}</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-md-2 control-label" for="name">{{trans('orbscope.identy_id')}} <span class="required" aria-required="true"> * </span></label>

                            <div class="col-md-4">
                                {!! Form::text('id_number',$edit->id_number,['class'=>'form-control','id'=>'id_number','required'=>'required']) !!}
                                <i class="fa fa-spinner fa-spin loading hidden"></i>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="nationality">{{trans('orbscope.nationality')}}<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-4">
                                {!! Form::text('nationality',$edit->nationality,['class'=>'form-control','required'=>'required']) !!}
                            </div>


                            <label class="col-md-2 control-label" for="passport_id">{{trans('orbscope.passport_id')}}<span class="required" aria-required="true"> * </span></label>

                            <div class="col-md-4">
                                    {!! Form::text('passport_id',$edit->passport_id,['class'=>'form-control','id'=>'passport_id','required'=>'required']) !!}
                                <i class="fa fa-spinner fa-spin loading hidden"></i>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="date">{{trans('orbscope.id_expiration_date')}}<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-4">
                                {!! Form::text('id_expiration_date',$edit->id_expiration_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}
                            </div>
                            <label class="col-md-2 control-label" for="phone">{{trans('orbscope.passport_expiration_date')}}<span class="required" aria-required="true"> * </span></label>

                            <div class="col-md-4">
                                {!! Form::text('passport_expiration_date',$edit->passport_expiration_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}

                                <i class="fa fa-spinner fa-spin loading hidden"></i>
                            </div>
                        </div>






                        <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="date">{{trans('orbscope.birth_date')}}<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-4">
                                {!! Form::text('birth_date',$edit->birth_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}
                            </div>
                            <label class="col-md-2 control-label" for="phone">{{trans('orbscope.phone')}} <span class="required" aria-required="true"> * </span></label>

                            <div class="col-md-4">
                                {!! Form::text('phone',$edit->phone,['class'=>'form-control','id'=>'phone','required'=>'required']) !!}
                                <i class="fa fa-spinner fa-spin loading hidden"></i>
                            </div>
                        </div>

                        @if($edit->type=='owner')
                        <div class="form-group">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        {{trans('orbscope.bank_account')}}
                                    </div>
                                    <div class="tools">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th> {{trans('orbscope.bank_account_number')}} </th>
                                                <th> {{trans('orbscope.bank_name')}} </th>
                                                <th> x </th>


                                            </tr>
                                            </thead>
                                            <tbody class="new_service">




                                                @foreach(@$edit->bankaccont as $k=>$v)

                                                    <tr>
                                                        <input type="hidden" name="count_number[]">
                                                        <input type="hidden" name="main_id[]" value="{{$v->id}}">
                                                        <td>  <input type="text" value="{{$v->bank_account}}" required class="form-control" name="bank_account[]"> </td>
                                                        <td> <select  class="form-control" name="bank_id[]">
                                                                <option value=""></option>
                                                                @foreach(\App\Models\Bank::all() as $b)
                                                                    <option {{$v->bank_id==$b->id?'selected':''}} value="{{$b->id}}">{{$b->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td style="padding-top: 15px;"></td>
                                                    </tr>

                                                @endforeach






                                            </tbody>

                                        </table>
                                        <a id="add_bankacount"  class="btn btn-icon-only green">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="form-group">
                            {!! Form::label('id_image',trans('orbscope.identy_id'),['class'=>'col-md-2 control-label','for'=>'id_image']) !!}
                            <div class="col-md-10">

                                         <input type="file" name="id_image" id="logo" >


                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('id_image',trans('orbscope.passport_image'),['class'=>'col-md-2 control-label','for'=>'id_image']) !!}
                            <div class="col-md-10">



                                         <input type="file"   name="passport_image" id="passport_image" >


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
     $(document).on('click', '#add_bankacount', function () {

         $.ajax({
             url: '{{url(AdminPath().'/add_bankacount')}}',
             dataType: 'html',
             type: 'post',
             data: {_token: '{{csrf_token()}}'},
             beforeSend: function () {

             }, success: function (data) {
                 $('.new_service').append(data);
             }
         });
     });
 </script>
@endsection
