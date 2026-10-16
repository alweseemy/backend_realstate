@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('admin/contracts')}}">{{trans('orbscope.contracts')}}</a>
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
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/check_edit/'.$edit->id,'method'=>'post','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">





                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bank_receipt_number">{{trans('orbscope.bank_receipt_number')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                <input type="text" class="form-control" name="number" value="{{$edit->number}}" required>
                                </div>

                                <label class="col-md-2 control-label" for="status">{{trans('orbscope.status')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                 <select name="status" required class="form-control">
                                     <option {{$edit->status=='received'?'selected':''}} value="received">{{trans('orbscope.received')}}</option>
                                     <option {{$edit->status=='not_received'?'selected':''}} value="not_received">{{trans('orbscope.not_received')}}</option>
                                 </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bank_name">{{trans('orbscope.bank_name')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="bank_id" id="bank_id" >
                                        @foreach(\App\Models\Bank::all() as $in)
                                            <option {{$edit->bank_id==$in->id ?'selected':''}}  value="{{$in->id}}">{{$in->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.amount_money')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                 <input type="number" step="any" class="form-control" name="amount" required value="{{$edit->amount}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="date">Due Date<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('from_date',$edit->from_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','required'=>'required']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.to_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('to_date',$edit->to_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','required'=>'required']) !!}
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.details')}}</label>

                                <div class="col-md-10">
                                    {!! Form::textarea('details',$edit->details,['class'=>'form-control']) !!}
                                </div>
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

        $(document).on('change', '#unit_id', function () {
            var unit = $(this).val();
            $.ajax({
                url: '{{url(AdminPath().'/units/all_types/rents')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}', unit: unit},
                beforeSend: function () {
                    $('.city_data').empty();
                }, success: function (data) {
                    $('.city_data').html(data);
                }
            });
        });


    </script>

@endsection
