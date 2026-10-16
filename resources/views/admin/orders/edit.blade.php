@extends(AdminCore())
@section('content')
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
                <a href="{{url('/orders')}}">{{trans('orbscope.orders')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/orders')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.orders')}}">
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


                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/orders/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
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
                                                <option value="{{$unit->id}}" {{$edit->flat_id==$unit->id?'selected':''}}>{{@$unit->flattype->name}} {{$unit->unit_number}} - {{trans('orbscope.'.$unit->status)}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">{{trans('orbscope.applicant')}} </label>
                                <div class="col-md-4">
                                    <select class="form-control" required name="applicant" id="order_type" >
                                        <option {{$edit->applicant=='user'?'selected':''}} value="user">{{trans('orbscope.user')}}</option>
                                        <option {{$edit->applicant=='owner'?'selected':''}} value="owner">{{trans('orbscope.owner')}}</option>
                                    </select>
                                </div>
                                <label class="col-md-2 control-label">{{trans('orbscope.amount_money')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <input class="form-control" value="{{$edit->amount}}" type="number" step="any" required name="amount" id="amount" >
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="status">{{trans('orbscope.status')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="status" id="status" >
                                        <option {{$edit->status=='new'?'selected':''}} value="new">{{trans('orbscope.new')}}</option>
                                        <option  {{$edit->status=='progress'?'selected':''}} value="progress">{{trans('orbscope.progress')}}</option>
                                        <option  {{$edit->status=='done'?'selected':''}} value="done">{{trans('orbscope.done')}}</option>
                                        <option  {{$edit->status=='canceled'?'selected':''}} value="canceled">{{trans('orbscope.canceled')}}</option>

                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.maintenance_type')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="order_type" id="order_type" >
                                        <option value=""></option>
                                        @foreach(\App\Models\Order_type::all() as $unit)
                                            <option {{$edit->order_type==$unit->id?'selected':''}}  value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',$edit->date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.closing_date_request')}}</label>
                                <div class="col-md-4">
                                    {!! Form::text('close_date',$edit->close_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.details')}}</label>

                                <div class="col-md-10">
                                    {!! Form::textarea('details',$edit->details,['class'=>'form-control']) !!}
                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="images">{{trans('orbscope.maintenance_attachments')}} </label>
                                <div class="col-md-10">
                                    @php
                                        if($edit->maintenance_attachments != ''){
                                            $images = explode('|',$edit->maintenance_attachments);
                                        }else{
                                            $images = null;
                                        }
                                    @endphp
                                    <input type="file" multiple name="maintenance_attachments[]" class="form-control"  >
                                    @if($images != null)
                                        <div style="margin-bottom: 20px;margin-top: 20px">
                                            <table class="table-scrollable" style="border: none;">
                                                @foreach($images as $image)
                                                    <tr style="height: 50px;">
                                                        <input type="hidden" name="oldMaintenance_attachments[]" value="{{$image}}">
                                                        <th> <i class="fa {{getTypeFile(getEx($image))['fileIcon']}}" aria-hidden="true"></i></th>
                                                        <th>{{$image}}</th>
                                                        <th style="width: 20%;"> <a  href="{{url('uploads/'.$image)}}" style="margin: 3px;" >
                                                                {{trans('orbscope.view')}}
                                                            </a></th>
                                                        <th><span class="btn-sm removeImage" style="color: red"><i class="fa fa-trash-o" style="color: #d20000; font-size: 15px; cursor: pointer;"></i></span></th>
                                                    </tr>
                                                @endforeach

                                            </table>

                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="images">{{trans('orbscope.maintenance_attachments')}} </label>
                                <div class="col-md-10">
                                    @php
                                        if($edit->invoice_attachments != ''){
                                            $images = explode('|',$edit->invoice_attachments);
                                        }else{
                                            $images = null;
                                        }
                                    @endphp
                                    <input type="file" multiple name="invoice_attachments[]" class="form-control"  >
                                    @if($images != null)
                                        <div style="margin-bottom: 20px;margin-top: 20px">
                                            <table class="table-scrollable" style="border: none;">
                                                @foreach($images as $image)
                                                    <tr style="height: 50px;">
                                                        <input type="hidden" name="oldInvoice_attachments[]" value="{{$image}}">
                                                        <th> <i class="fa {{getTypeFile(getEx($image))['fileIcon']}}" aria-hidden="true"></i></th>
                                                        <th>{{$image}}</th>
                                                        <th style="width: 20%;"> <a  href="{{url('uploads/'.$image)}}" style="margin: 3px;" >
                                                                {{trans('orbscope.view')}}
                                                            </a></th>
                                                        <th><span class="btn-sm removeImage" style="color: red"><i class="fa fa-trash-o" style="color: #d20000; font-size: 15px; cursor: pointer;"></i></span></th>
                                                    </tr>
                                                @endforeach

                                            </table>

                                        </div>
                                    @endif
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
