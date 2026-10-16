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
                <a href="{{url('admin/invoice')}}">{{trans('orbscope.invoices')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/invoice')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.invoices')}}">
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
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/invoice/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">





                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" {{$edit->unit_id==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="city_data">
                                    <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.apartment')}}</label>

                                    <div class="col-md-4">
                                        <select class="form-control"  name="flat_id" id="flat_id" >
                                            <option value=""></option>
                                            @foreach($flats as $unit)
                                                <option value="{{$unit->id}}" {{$edit->flat_id==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.invoice_type')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="type" id="order_type" >
                                        @foreach(\App\Models\Invoicetype::all() as $in)
                                            <option {{$edit->type==$in->id ?'selected':''}}  value="{{$in->id}}">{{$in->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('date',$edit->date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','required'=>'required']) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="price">{{trans('orbscope.amount_money')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i style="margin: 7px 10px 4px 2px;{{GetLanguage()=='ar'?'left':'right'}}: 25px;color: black;">{{trans('orbscope.aed')}}</i>
                                        <input type="text" pattern="[0-9]+([,][0-9]{1,2})?" step="any" name="amount" value="{{$edit->amount}}" required class="form-control" placeholder="">
                                    </div>
                                </div>
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.details')}}</label>

                                <div class="col-md-4">
                                    {!! Form::textarea('details',$edit->details,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('logo',trans('orbscope.attachments'),['class'=>'col-md-2 control-label','for'=>'image']) !!}
                                <div class="col-md-10">

                                                <input type="file" class="form-control" name="image[]" id="image" multiple>

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
