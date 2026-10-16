@extends(AdminCore())
@section('content')
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/orders')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   الطلبات">
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

                        {!! Form::open(['files'=>true,'route'=>'orders.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option  {{old('unit_id')==$unit->id?'selected':''}} value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="city_data hidden"></div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.maintenance_type')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="order_type" id="order_type" >
                                        <option value=""></option>
                                        @foreach(\App\Models\Order_type::all() as $unit)
                                            <option {{old('order_type')==$unit->id?'selected':''}}  value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',old('start_date'),['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-2 control-label">{{trans('orbscope.applicant')}} </label>
                                <div class="col-md-4">
                                    <select class="form-control" required name="applicant" id="order_type" >
                                        <option value="user">{{trans('orbscope.user')}}</option>
                                        <option value="owner">{{trans('orbscope.owner')}}</option>
                                    </select>
                                </div>
                                <label class="col-md-2 control-label">{{trans('orbscope.amount_money')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" step="any" required name="amount" id="amount" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.details')}}</label>

                                <div class="col-md-4">
                                    {!! Form::textarea('details',old('details'),['class'=>'form-control']) !!}
                                </div>
                                {!! Form::label('maintenance_attachments',trans('orbscope.maintenance_attachments'),['class'=>'col-md-2 control-label','for'=>'main_image']) !!}
                                <div class="col-md-4">


                                         <input type="file" class="form-control" name="maintenance_attachments[]" id="maintenance_attachments" multiple>

                                </div>
                            </div>



                            <div class="form-group">
                                {!! Form::label('invoice_attachments',trans('orbscope.invoice_attachments'),['class'=>'col-md-2 control-label','for'=>'main_image']) !!}
                                <div class="col-md-4">


                                         <input type="file"  class="form-control" name="invoice_attachments[]" id="logo" multiple>


                                </div>
                            </div>






                        </div>
                        <div class="form-actions right1">
                            <button type="submit" class="btn green">{{trans('orbscope.add')}}</button>
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
                @if(old('unit_id'))
        var unit  = $('#unit_id option:selected').val();
        var flat_id     = $('#flat_id option:selected').val();
        $.ajax({
            url:'{{url(AdminPath().'/orders/ajax')}}',
            dataType:'html',
            type:'post',
            data:{_token:'{{csrf_token()}}',unit:unit,flat_id:flat_id},
            beforeSend: function()
            {
                $('.city_data').removeClass('hidden');
            },success: function(data)
            {
                $('.city_data').html(data);
                $('select[name="flat_id"]').val("{{old('flat_id')}}");
            }
        });
        @endif

        $(document).on('change', '#unit_id', function () {
            var unit = $(this).val();
            $.ajax({
                url: '{{url(AdminPath().'/orders/ajax')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}', unit: unit},
                beforeSend: function () {
                    $('.city_data').removeClass('hidden');
                }, success: function (data) {
                    $('.city_data').html(data);
                }
            });
        });




    </script>

@endsection
