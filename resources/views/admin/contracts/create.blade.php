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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/contracts')}}" data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   العقود">
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

                        {!! Form::open(['files'=>true,'route'=>'contracts.store','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">





                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option @if(old('unit_id') == $unit->id) selected @endif  value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="city_data hidden"></div>
                            </div>





                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.start_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',old('start_date'),['class'=>'form-control date-picker','id'=>'start_date','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="month">{{trans('orbscope.end_date')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('end_date',old('end_date'),['class'=>'form-control date-picker','id'=>'end_date','data-date-format'=>'yyyy-mm-dd']) !!}

                                </div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">{{trans('orbscope.annual_rent_amount')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                        <input  type="text"  id="amount" name="amount" value="{{old('amount')==null ? 0 : old('amount')}}" required class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                                <label class="col-md-2 control-label" for="insurance">{{trans('orbscope.tax_percentage')}}</label>
                                <div class="col-md-4">


                                        <input  type="text"  id="insurance" name="insurance" value="{{old('insurance')==null ? 0 : old('insurance')}}"  class="form-control" placeholder="%">

                                </div>
                            </div>




                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">{{trans('orbscope.previous_indebtedness')}}</label>
                                <div class="col-md-4">


                                    <input type="text"  id="credit_amount" name="credit_amount" value="{{old('credit_amount')==null ? 0 : old('credit_amount')}}"  class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>



                                    <input  type="hidden"  id="insurance_credit" name="insurance_credit" value="{{old('insurance_credit')==null ? 0 : old('insurance_credit')}}"  class="form-control" placeholder="%">


                                <label class="col-md-2 control-label"  for="price">{{trans('orbscope.total')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                    <input  type="text" id="price"  readonly name="price" value="{{old('price')}}" required class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                            </div>

                            <div class="form-group">

                                <label class="col-md-2 control-label" for="garage_id">{{trans('orbscope.garage')}}</label>

                                <div class="col-md-4 garage_data">
                                    <select class="form-control"  name="garage_id" id="garage_id" >
                                        <option value=""></option>

                                    </select>
                                </div>


                                <label class="col-md-2 control-label" for="insurance">{{trans('orbscope.garage_rent_amount')}}</label>
                                <div class="col-md-4">


                                    <input  type="number"  id="garage_rent_amount" name="garage_rent_amount" value="{{old('garage_rent_amount')==null ? 0 : old('garage_rent_amount')}}"  class="form-control" placeholder="">
                                </div>
                                <input  type="hidden"  id="insurance_credit" name="insurance_credit" value="{{old('insurance_credit')==null ? 0 : old('insurance_credit')}}"  class="form-control" placeholder="%">

                            </div>



                            <!---

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">رسوم الكهرباء</label>
                                <div class="col-md-4">


                                    <input  type="text"  name="electricity_fee" value="{{old('electricity_fee')}}"  class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                                <label class="col-md-2 control-label" for="">رسوم الماء</label>
                                <div class="col-md-4">


                                    <input  type="text" name="water_fee" value="{{old('water_fee')}}"  class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                            </div>
                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">رسوم الغاز</label>
                                <div class="col-md-4">


                                    <input  type="text"  name="gas_fee" value="{{old('gas_fee')}}"  class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                                <label class="col-md-2 control-label" for="">رسوم اخري</label>
                                <div class="col-md-4">


                                    <input  type="text"  name="other_fees" value="{{old('other_fees')}}"  class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                            </div>

                            --->




                            <div class="form-group">
                                <label class="col-md-2 control-label">{{trans('orbscope.rental_cycle')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-10">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios25"  value="monthly" {{old('period')=='monthly'?'checked':''}}> {{trans('orbscope.monthly')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios26" value="quarterly" {{old('period')=='quarterly'?'checked':''}}> {{trans('orbscope.quarterly')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios27" value="biannual" {{old('period')=='biannual'?'checked':''}}> {{trans('orbscope.biannual')}}
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios26" value="yearly" {{old('period')=='yearly'?'checked':''}}>  {{trans('orbscope.yearly')}}
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


                            <div class="form-group bank_name hidden {{old('unit_insurance_type')!='bank_receipt'?'hidden':''}}">

                                <label class="col-md-2 control-label" >{{trans('orbscope.bank_name')}}</label>

                                <div class="col-md-4">
                                    <select class="form-control"  name="bank_id" id="bank_id" >
                                        @foreach(\App\Models\Bank::all() as $b)
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <label class="col-md-2 control-label" for="insurance">{{trans('orbscope.amount_money')}}</label>
                                <div class="col-md-4">


                                    <input  type="number"  id="amount_bank" name="amount_bank" value="{{old('amount_bank')==null ? 0 : old('amount_bank')}}"  class="form-control" placeholder="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="user_id">{{trans('orbscope.user')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-10">
                                    <select class="form-control @if(old('add_user')) hidden @endif" class="@if(old('add_user')) hidden @endif"  name="user_id" id="user_id" >
                                        <option value=""></option>
                                        @foreach($users as $unit)
                                            <option value="{{$unit->id}}" {{old('user_id')==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                    <a  id="add_rent" class="@if(old('add_user')) hidden @endif" >{{trans('orbscope.add')}} {{trans('orbscope.user')}}</a>

                                    <div class="portlet box purple @if(old('add_user')) @else hidden @endif">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>{{trans('orbscope.add')}} {{trans('orbscope.user')}}</div>
                                            <div class="tools">
                                                <a id="delete_user" style="color: white;" title="حذف"> <i class="fa fa-trash"></i> {{trans('orbscope.delete')}}</a>

                                            </div>
                                        </div>
                                        <div class="portlet-body form">

                                            <input type="hidden" name="add_user" value="yes" disabled id="input_add">


                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="name">{{trans('orbscope.name')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    {!! Form::text('name',old('name'),['class'=>'form-control','id'=>'name']) !!}
                                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                                </div>
                                                <label class="col-md-2 control-label" for="email">{{trans('orbscope.email')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    {!! Form::email('email',old('email'),['class'=>'form-control','id'=>'email','placeholder'=>trans('orbscope.email')]) !!}
                                                </div>

                                            </div>

                                            <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="name">{{trans('orbscope.identy_id')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    {!! Form::number('id_number',old('id_number'),['class'=>'form-control','id'=>'id_number']) !!}
                                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                                    @if ($errors->has('id_number'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('id_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <label class="col-md-2 control-label" for="passport_id"><span class="required" aria-required="true"> * </span> {{trans('orbscope.passport_id')}} </label>

                                                <div class="col-md-4">
                                                    {!! Form::text('passport_id',old('passport_id'),['class'=>'form-control','id'=>'passport_id']) !!}
                                                    <i class="fa fa-spinner fa-spin loading hidden"></i>
                                                    @if ($errors->has('passport_id'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('passport_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>


                                            <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.nationality')}}</label>
                                                <div class="col-md-4">
                                                    {!! Form::text('nationality',old('nationality'),['class'=>'form-control']) !!}
                                                </div>
                                                <label class="col-md-2 control-label" for="phone">{{trans('orbscope.phone')}} <span class="required" aria-required="true"> * </span></label>

                                                <div class="col-md-4">
                                                    <input @if ($errors->has('phone')) style="border-color: #e73d4a" @endif class="form-control"  type="number" value="{{ old('phone') }}" placeholder="{{trans('orbscope.phone')}}" name="phone" />

                                                    @if ($errors->has('phone'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('id_image',trans('orbscope.id_image'),['class'=>'col-md-2 control-label','for'=>'id_image']) !!}
                                                <div class="col-md-4">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;">
                                                        </div>
                                                        <div>
                                                                    <span class="btn default btn-file">
                                                                         <span class="fileinput-new"> {{trans('orbscope.select-image')}}</span>
                                                                         <span class="fileinput-exists"> {{trans('orbscope.change')}} </span>
                                                                         <input type="file" name="id_image" id="logo" accept=".image/jpeg,.png,.jpg,.bmp,.gif">
                                                                    </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
                                                               data-dismiss="fileinput"> {{trans('orbscope.remove')}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::label('id_image',trans('orbscope.passport_image'),['class'=>'col-md-2 control-label','for'=>'passport_image']) !!}

                                                <div class="col-md-4">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;">
                                                        </div>
                                                        <div>
                                                                    <span class="btn default btn-file">
                                                                         <span class="fileinput-new"> {{trans('orbscope.select-image')}}</span>
                                                                         <span class="fileinput-exists"> {{trans('orbscope.change')}} </span>
                                                                         <input type="file" name="passport_image" id="passport_image" accept=".image/jpeg,.png,.jpg,.bmp,.gif">
                                                                    </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
                                                               data-dismiss="fileinput"> {{trans('orbscope.remove')}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>



                                </div>

                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.terms_conditions')}}</label>

                                <div class="col-md-10">
                                    {!! Form::textarea('details',old('details'),['class'=>'form-control']) !!}
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
            url:'{{url(AdminPath().'/units/ajax')}}',
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
                url: '{{url(AdminPath().'/units/ajax')}}',
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


       $(document).on('change', '#unit_id', function () {
           var unit = $(this).val();
           $.ajax({
               url: '{{url(AdminPath().'/garage/ajax')}}',
               dataType: 'html',
               type: 'post',
               data: {_token: '{{csrf_token()}}', unit: unit},
               beforeSend: function () {

               }, success: function (data) {
                   $('.garage_data').html(data);
               }
           });
       });


       $(document).on('click', '#add_rent', function () {

            $('.purple').removeClass('hidden');
            $('#user_id').addClass('hidden');
            $('#input_add').removeAttr('disabled');
            $('#add_rent').addClass('hidden');


        });
        @if(old('add_user'))

            $('.purple').removeClass('hidden');
            $('#user_id').addClass('hidden');
            $('#input_add').removeAttr('disabled');
            $('#add_rent').addClass('hidden');

        @endif
        $(document).on('click', '#delete_user', function () {

            $('.purple').addClass('hidden');
            $('#user_id').removeClass('hidden');
            $('#add_rent').removeClass('hidden');
            $('#input_add').attr('disabled', true); ;


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
           //var month= $('#month').val();
           //var onemonth =amount/12;
           amount =parseInt(amount);
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
          // var month= $('#month').val();
           //var onemonth =amount/12;
           amount =parseInt(amount);

           var ins =$('#insurance').val();
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
           //var month= $('#month').val();
           //var onemonth =amount/12;
           amount =parseInt(amount);

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
