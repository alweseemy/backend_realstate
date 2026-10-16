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
                <a href="{{url('/admin/contracts')}}">{{trans('orbscope.lease_contracts')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/contracts')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   ">
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


                        {!! Form::open(['files'=>true,'route'=>'contracts.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">
                            <input type="hidden" name="old_contract" value="{{$edit->id}}">
                            

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control"   name="unit_id" id="unit_id" >

                                            <option  value="{{$edit->unit_id}}" >{{@$edit->unit->name}}</option>


                                    </select>
                                </div>
                                <div class="city_data">
                                    <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.apartment')}}</label>

                                    <div class="col-md-4">
                                        <select class="form-control"     name="flat_id" id="flat_id" >


                                                <option value="{{$edit->flat_id}}" > {{@$edit->flat->unit_number}}</option>


                                        </select>
                                    </div>
                                </div>
                            </div>






                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.start_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',old('start_date'),['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.date_range')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input  id="month"  type="text" pattern="[0-9]+([,][0-9]{1,2})?" name="month"  value="0" required class="form-control" placeholder="{{trans('orbscope.month')}}">
                                    <span style="color: red;" id="rent_date"></span>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="price">{{trans('orbscope.annual_rent_amount')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input type="text"  id="amount"  value="0" name="amount" required class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                                <label class="col-md-2 control-label" for="insurance">{{trans('orbscope.tax_percentage')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input  id="insurance" type="text"  step="any" value="0" name="insurance"  class="form-control" placeholder="%">

                                </div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">{{trans('orbscope.previous_indebtedness')}}</label>
                                <div class="col-md-4">


                                    <input  type="text"  id="credit_amount" name="credit_amount" value=""  class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>

                                <label class="col-md-2 control-label"   for="price">{{trans('orbscope.total')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">

                                    <input type="text"  readonly id="price" step="any"  name="price" value="" required class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>


                            </div>




                            <div class="form-group">

                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.user')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control"   name="user_id" id="user_id" >

                                            <option value="{{$edit->user_id}}" >{{$edit->user->name}}</option>

                                    </select>
                                </div>



                            </div>



                            <div class="form-group">

                                <label class="col-md-2 control-label" for="garage_id">{{trans('orbscope.garage')}}</label>

                                <div class="col-md-4 garage_data">
                                    <select class="form-control"  name="garage_id" id="garage_id" >


                                            <option   value="{{$edit->garage_id}}">{{@$edit->garage->unit_number}}</option>


                                    </select>
                                </div>


                                <label class="col-md-2 control-label" for="insurance">{{trans('orbscope.garage_rent_amount')}}</label>
                                <div class="col-md-4">


                                    <input  type="number"   id="garage_rent_amount" name="garage_rent_amount" value="{{$edit->garage_rent_amount}}"  class="form-control" placeholder="">
                                </div>
                                <input  type="hidden"  id="insurance_credit" name="insurance_credit" value="{{old('insurance_credit')==null ? 0 : old('insurance_credit')}}"  class="form-control" placeholder="%">

                            </div>




                            <div class="form-group">
                                <label class="col-md-2 control-label">{{trans('orbscope.rental_cycle')}}</label>
                                <div class="col-md-10">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios25" value="monthly" {{$edit->period=='monthly'?'checked':''}}> {{trans('orbscope.monthly')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios26" value="quarterly" {{$edit->period=='quarterly'?'checked':''}}> {{trans('orbscope.quarterly')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios27" value="biannual" {{$edit->period=='biannual'?'checked':''}}> {{trans('orbscope.biannual')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios26" value="yearly" {{$edit->period=='yearly'?'checked':''}}>  {{trans('orbscope.yearly')}}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{trans('orbscope.insurance')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="unit_insurance_type" id="bank_receipt"  value="bank_receipt" {{old('unit_insurance_type')=='bank_receipt'?'checked':''}}> {{trans('orbscope.bank_receipt')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="unit_insurance_type"  id="cash_money"  value="cash_money" {{old('unit_insurance_type')=='cash_money'?'checked':''}}> {{trans('orbscope.cash_money')}}
                                            <span></span>
                                        </label>

                                    </div>
                                </div>
                                <div id="amount_money_input" @if(old('unit_insurance_type')!='cash_money')class="hidden" @endif>
                                    <label class="col-md-2 control-label">{{trans('orbscope.amount_money')}} <span class="required" aria-required="true"> * </span></label>

                                </div>
                                <div id="bank_receipt_number" @if(old('unit_insurance_type')!='bank_receipt')class="hidden" @endif>
                                    <label class="col-md-2 control-label">{{trans('orbscope.bank_receipt_number')}} <span class="required" aria-required="true"> * </span></label>
                                </div>

                                <div class="col-md-4" >

                                    <input type="text" value="{{old('unit_insurance_value')}}" name="unit_insurance_value" id="insurance_value_receipt" class="form-control {{old('unit_insurance_type') == null? 'hidden':''}}"  placeholder="">
                                </div>

                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.terms_conditions')}}</label>

                                <div class="col-md-10">
                                    {!! Form::textarea('details',$edit->details,['class'=>'form-control']) !!}
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="pdf">{{trans('orbscope.images')}} </label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="images[]" id="multiUp"  multiple>
                                </div>
                            </div>




                        </div>
                        <div class="form-actions right1">
                            <button type="submit" class="btn green">{{trans('front.renew')}}</button>
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

        $('#month').on('keyup',function () {
            var month = $(this).val();

            var date=$('#start_date').val();
            $.ajax({
                url:'{{url(AdminPath().'/get/rent_end/date')}}',
                dataType:'html',
                type:'post',
                data:{month:month,date:date,_token:'{{csrf_token()}}'},
                beforeSend: function()
                {

                },success: function(data)
                {
                    $('#rent_date').html(data);
                }
            });
        });



        $("#insurance").keyup(function(){
            var ins = $(this).val();
            var amount =$('#amount').val();
            var month= $('#month').val();
            var onemonth =amount/12;
            amount =parseInt(month)*onemonth;
            var credit_amount =$('#credit_amount').val();
            if (credit_amount==''){
                credit_amount=0;
            }
            var ins_cradit =$('#insurance_credit').val();
            if (ins_cradit==''){
                ins_cradit=0;
            }

            var percent = parseInt(amount) * parseInt(ins) / 100;
            var percent_creadit = parseInt(credit_amount) * parseInt(ins_cradit) / 100;


            var total = parseInt(percent) + parseInt(amount) + parseInt(percent_creadit) + parseInt(credit_amount);

            $('#price').val(total);

        });
        $("#amount").keyup(function(){

            var amount = $(this).val();
            var month= $('#month').val();
            var onemonth =amount/12;
            amount =parseInt(month)*onemonth;
            var ins =$('#insurance').val();
            if (ins==''){
                ins=0;
            }
            var credit_amount =$('#credit_amount').val();
            if (credit_amount==''){
                credit_amount=0;
            }
            // var ins_cradit =$('#insurance_credit').val();
            var ins_cradit =$('#insurance_credit').val();
            if (ins_cradit==''){
                ins_cradit=0;
            }

            var percent = parseInt(amount) * parseInt(ins) / 100;
            var percent_creadit = parseInt(credit_amount) * parseInt(ins_cradit) / 100;
            var total = parseInt(percent) + parseInt(amount)+ parseInt(percent_creadit) + parseInt(credit_amount);

            $('#price').val(total);

        });

        $("#month").keyup(function(){

            var month = $(this).val();
            var amount= $('#amount').val();
            var onemonth =amount/12;
            amount =parseInt(month)*onemonth;

            var ins =$('#insurance').val();
            if (ins==''){
                ins=0;
            }
            var credit_amount =$('#credit_amount').val();
            if (credit_amount==''){
                credit_amount=0;
            }
            // var ins_cradit =$('#insurance_credit').val();
            var ins_cradit =$('#insurance_credit').val();
            if (ins_cradit==''){
                ins_cradit=0;
            }

            var percent = parseInt(amount) * parseInt(ins) / 100;
            var percent_creadit = parseInt(credit_amount) * parseInt(ins_cradit) / 100;
            var total = parseInt(percent) + parseInt(amount)+ parseInt(percent_creadit) + parseInt(credit_amount);

            $('#price').val(total);

        });

        $("#credit_amount").keyup(function(){

            var credit_amount = $(this).val();
            var ins =$('#insurance').val();
            if (ins==''){
                ins=0;
            }
            var amount =$('#amount').val();
            var month= $('#month').val();
            var onemonth =amount/12;
            amount =parseInt(month)*onemonth;
            var ins_cradit =$('#insurance_credit').val();
            if (ins_cradit==''){
                ins_cradit=0;
            }

            var percent = parseInt(amount) * parseInt(ins) / 100;
            var percent_creadit = parseInt(credit_amount) * parseInt(ins_cradit) / 100;
            var total = parseInt(percent) + parseInt(amount)+ parseInt(percent_creadit) + parseInt(credit_amount);

            $('#price').val(total);

        });

        $("#insurance_credit").keyup(function(){

            var ins_cradit = $(this).val();
            var ins =$('#insurance').val();
            if (ins==''){
                ins=0;
            }
            var amount =$('#amount').val();
            var month= $('#month').val();
            var onemonth =amount/12;
            amount =parseInt(month)*onemonth;
            var credit_amount =$('#credit_amount').val();

            var percent = parseInt(amount) * parseInt(ins) / 100;
            var percent_creadit = parseInt(credit_amount) * parseInt(ins_cradit) / 100;
            var total = parseInt(percent) + parseInt(amount)+ parseInt(percent_creadit) + parseInt(credit_amount);

            $('#price').val(total);

        });
        $("#cash_money").change(function() {
            if(this.checked) {
                $('#bank_receipt_number').addClass('hidden');
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
                $('#insurance_value_receipt').removeClass('hidden');
                $("#insurance_value_receipt").prop('required',true);



            }else {

                $('#bank_receipt_number').addClass('hidden');
            }
        });
    </script>




@endsection
