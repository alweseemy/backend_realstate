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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/invoice')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   العمليات">
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

                        {!! Form::open(['files'=>true,'route'=>'invoice.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option  @if(old('unit_id') == $unit->id) selected @endif  value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="city_data hidden"></div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.invoice_type')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="type" id="order_type" >
                                        @foreach(\App\Models\Invoicetype::all() as $in)
                                        <option {{old('type')==$in->id ?'selected':''}}  value="{{$in->id}}">{{$in->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.date')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('date',old('start_date'),['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd','required'=>'required']) !!}
                                </div>
                            </div>



                            <div class="form-group">
                                <!--
                                <label class="col-md-2 control-label" for="price">{{trans('orbscope.amount_money')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                        <input min="1" type="number" step="any" name="amount" value="{{old('amount')}}" required class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>-->
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.details')}}</label>

                                <div class="col-md-10">
                                    {!! Form::textarea('details',old('details'),['class'=>'form-control']) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">{{trans('orbscope.type')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="money_type" id="bank_receipt"  value="bank_receipt" {{old('unit_insurance_type')=='bank_receipt'?'checked':''}}> {{trans('orbscope.bank_receipt')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="money_type"  id="cash_money"  value="cash_money" {{old('unit_insurance_type')=='cash_money'?'checked':''}}> {{trans('orbscope.cash_money')}}
                                            <span></span>
                                        </label>

                                    </div>
                                </div>
                            </div>



                                <div class="form-group">
                                <label class="col-md-2 control-label">{{trans('orbscope.amount_money')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4" >

                                    <input type="number" step="any" value="{{old('amount')}}" name="amount" id="insurance_value_receipt" class="form-control " placeholder="">
                                </div>
                                </div>




                            <div class="form-group bank_name hidden">
                                <label class="col-md-2 control-label">{{trans('orbscope.bank_receipt_number')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4" >

                                    <input type="text" value="{{old('bank_receipt_number')}}" name="bank_receipt_number" id="insurance_value_receipt" class="form-control   placeholder="">
                                </div>

                                <label class="col-md-2 control-label" >{{trans('orbscope.bank_name')}}</label>

                                <div class="col-md-4">
                                    <select class="form-control"  name="bank_id" id="bank_id" >
                                        @foreach(\App\Models\Bank::all() as $b)
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                {!! Form::label('logo',trans('orbscope.attachments'),['class'=>'col-md-2 control-label','for'=>'main_image']) !!}
                                <div class="col-md-10">


                                         <input type="file" class="form-control" name="main_image[]" id="logo" multiple>


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
            url:'{{url(AdminPath().'/invoice/ajax')}}',
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
                url: '{{url(AdminPath().'/invoice/ajax')}}',
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

      $("#cash_money").change(function() {
          if(this.checked) {
              $('#bank_receipt_number').addClass('hidden');
              $('.bank_name').addClass('hidden');
              $('#amount_money_input').removeClass('hidden');
              $('#insurance_value_receipt').removeClass('hidden');
              $("#insurance_value_receipt").prop('required',true);

          }else {

              $('#amount_money_input').addClass('hidden');
          }
      });
      $("#bank_receipt").change(function() {
          if(this.checked) {
              $('#amount_money_input').addClass('hidden');
              $('#bank_receipt_number').removeClass('hidden');
              $('.bank_name').removeClass('hidden');
              $('#insurance_value_receipt').removeClass('hidden');
              $("#insurance_value_receipt").prop('required',true);



          }else {

              $('#bank_receipt_number').addClass('hidden');
          }
      });





    </script>

@endsection
