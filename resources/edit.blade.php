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
                <a href="{{url('/admin/contracts')}}">عقود الإيجار</a>
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
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   العقود">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}">
                        </a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            رجوع <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        {!! Form::open(['files'=>true,'url'=>AdminPath().'/contracts/'.$edit->id,'method'=>'put','class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="row">




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">العقار<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" {{$edit->unit_id==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="city_data">
                                    <label class="col-md-2 control-label" for="unit_id">الوحدة</label>

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






                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="date">تاريخ بداية العقد<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('start_date',$edit->start_date,['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                                <label class="col-md-2 control-label" for="month">مدة الايجار<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                        <input   type="text" pattern="[0-9]+([,][0-9]{1,2})?" name="month"  value="{{$edit->month}}" required class="form-control" placeholder="شهرا">

                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-2 control-label" for="price">مبلغ الايجار السنوي<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                        <input type="text"  id="amount"  value="{{$edit->amount}}" name="amount" required class="form-control" placeholder="ريال">

                                </div>
                                <label class="col-md-2 control-label" for="insurance">نسبة الضريبة<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                        <input  id="insurance" type="text"  step="any" value="{{$edit->insurance}}" name="insurance"  class="form-control" placeholder="%">

                                </div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">مديونية سابقة</label>
                                <div class="col-md-4">


                                    <input  type="text"  id="credit_amount" name="credit_amount" value="{{$edit->credit_amount}}"  class="form-control" placeholder="ريال">

                                </div>
                                <label class="col-md-2 control-label" for="insurance">نسبة الضريبة</label>
                                <div class="col-md-4">


                                    <input type="text"   id="insurance_credit" name="insurance_credit" value="{{$edit->insurance_credit}}"  class="form-control" placeholder="%">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"   for="price">الإجمالي<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-10">

                                    <input type="text"  readonly id="price" step="any"  name="price" value="{{$edit->price}}" required class="form-control" placeholder="ريال">

                                </div>
                            </div>


                            <div class="form-group">

                                <label class="col-md-2 control-label" for="status">حالة العقد<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="status" id="status" >
                                        <option {{$edit->status=='progress'?'selected':''}} value="progress">{{trans('log.progress')}}</option>
                                        <option {{$edit->status=='done'?'selected':''}} value="done">{{trans('log.done')}}</option>
                                        <option {{$edit->status=='canceled'?'selected':''}} value="canceled">{{trans('log.canceled')}}</option>
                                    </select>
                                </div>

                                <label class="col-md-2 control-label">دورة سداد الإيجار</label>
                                <div class="col-md-4">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios25" value="monthly" {{$edit->period=='monthly'?'checked':''}}> شهري
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios26" value="quarterly" {{$edit->period=='quarterly'?'checked':''}}> ربع سنوي
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios27" value="biannual" {{$edit->period=='biannual'?'checked':''}}> نصف سنوي
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="period" id="optionsRadios26" value="yearly" {{$edit->period=='yearly'?'checked':''}}>  سنوي
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">رسوم الكهرباء</label>
                                <div class="col-md-4">


                                    <input  type="text" pattern="[0-9]+([,][0-9]{1,2})?" name="electricity_fee" value="{{$edit->electricity_fee}}"  class="form-control" placeholder="ريال">

                                </div>
                                <label class="col-md-2 control-label" for="insurance">رسوم الماء</label>
                                <div class="col-md-4">


                                    <input type="text" pattern="[0-9]+([,][0-9]{1,2})?" name="water_fee" value="{{$edit->water_fee}}"  class="form-control" placeholder="ريال">

                                </div>
                            </div>
                            <div class="form-group rooms_content">
                                <label class="col-md-2 control-label" for="price">رسوم الغاز</label>
                                <div class="col-md-4">


                                    <input  type="text" pattern="[0-9]+([,][0-9]{1,2})?" name="gas_fee" value="{{$edit->gas_fee}}"  class="form-control" placeholder="ريال">

                                </div>
                                <label class="col-md-2 control-label" for="insurance">رسوم اخري</label>
                                <div class="col-md-4">


                                    <input  type="text" pattern="[0-9]+([,][0-9]{1,2})?" name="other_fees" value="{{$edit->other_fees}}"  class="form-control" placeholder="ريال">

                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-3 control-label" for="unit_id">المستأجر<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-9">
                                    <select class="form-control" required name="user_id" id="user_id" >
                                        <option value=""></option>
                                        @foreach($users as $unit)
                                            <option value="{{$unit->id}}" {{$edit->user_id==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label" for="bank_account">الشروط والأحكام</label>

                                <div class="col-md-9">
                                    {!! Form::textarea('details',$edit->details,['class'=>'form-control']) !!}
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="images">{{trans('orbscope.images')}} </label>
                                <div class="col-md-10">
                                    @php
                                        if($edit->images != ''){
                                            $images = explode('|',$edit->images);
                                        }else{
                                            $images = null;
                                        }
                                    @endphp
                                    <input type="file" multiple name="images[]" class="form-control" accept=".image/jpeg,.png,.jpg,.bmp,.gif" >
                                    @if($images != null)
                                    <div style="margin-bottom: 20px;margin-top: 20px">
                                        <table class="table-scrollable" style="border: none;">
                                            @foreach($images as $image)
                                            <tr style="height: 50px;">
                                                <input type="hidden" name="oldImages[]" value="{{$image}}">
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
                            <button type="submit" class="btn green">تعديل</button>
                            <a href="{{ url()->previous() }}" class="btn default">الغاء</a>
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
        $(document).on('click','.removeImage', function () {
            $(this).parent().parent().remove();
        });
    </script>

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
            var credit_amount =$('#credit_amount').val();

            var percent = parseInt(amount) * parseInt(ins) / 100;
            var percent_creadit = parseInt(credit_amount) * parseInt(ins_cradit) / 100;
            var total = parseInt(percent) + parseInt(amount)+ parseInt(percent_creadit) + parseInt(credit_amount);

            $('#price').val(total);

        });
    </script>




@endsection
