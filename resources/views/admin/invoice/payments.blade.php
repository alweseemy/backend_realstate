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
                <a href="{{url('admin/contracts')}}">{{trans('orbscope.lease_contracts')}}</a>
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
                        <input type="hidden" name="payment_id" value="{{$contract->id}}">
                        <input type="hidden" name="pay_type" value="{{$type}}">
                        <div class="row">


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.unit')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" required name="unit_id" id="unit_id" >
                                            <option  value="{{$contract->unit_id}}">{{@$contract->unit->name}}</option>
                                    </select>
                                </div>
                                <div class="city_data">
                                    <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.apartment')}}</label>

                                    <div class="col-md-4">
                                        <select class="form-control"  name="flat_id" id="flat_id" >
                                                <option value="{{$contract->flat_id}}" >{{@$contract->flat->flattype->name}} {{@$contract->flat->unit_number}} {{@$contract->user->name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.invoice_type')}}<span class="required" aria-required="true"> * </span></label>

                                <div class="col-md-4">
                                    <select class="form-control" readonly="readonly" required name="type" id="order_type" >
                                        @foreach(\App\Models\Invoicetype::where('id',1)->get() as $in)

                                            <option @if($type=='amount'){{1==$in->id ?'selected':''}}
                                                    @endif
                                                    value="{{$in->id}}">{{$in->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-2 control-label" for="date">{{trans('orbscope.date')}} <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text('date',old('date'),['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']) !!}
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label" for="price">{{trans('orbscope.amount_money')}}<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-4">


                                        <input type="text" pattern="[0-9]+([,][0-9]{1,2})?"  name="amount" value="{{old('amount')}}" required class="form-control" placeholder="{{trans('orbscope.aed')}}">

                                </div>
                                <label class="col-md-2 control-label" for="bank_account">{{trans('orbscope.details')}}</label>

                                <div class="col-md-4">
                                    <textarea rows="3" class="form-control" name="details">{{old('details')}}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::label('logo',trans('orbscope.attachments'),['class'=>'col-md-2 control-label','for'=>'main_image']) !!}
                                <div class="col-md-10">


                                         <input type="file" class="form-control" name="main_image[]" id="logo" multiple>

                                </div>
                            </div>



                            <div class="form-group">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            {{trans('orbscope.checks')}}
                                        </div>
                                        <div class="tools">

                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th> {{trans('orbscope.bank_receipt_number')}} </th>
                                                    <th> {{trans('orbscope.bank_name')}} </th>
                                                    <th> {{trans('orbscope.amount_money')}} </th>
                                                    <th> Due Date </th>
                                                    <th> {{trans('orbscope.date_range')}} {{trans('orbscope.to')}} </th>
                                                    <th> {{trans('orbscope.details')}} </th>
                                                    <th> x </th>


                                                </tr>
                                                </thead>
                                                <tbody class="new_ine">


                                                @if(old('number')!=null)

                                                    @foreach(old('number') as $k=>$v)

                                                        <tr>
                                                            <td> <input type="text" value="{{old('number')[$k]}}"  class="form-control" name="number[]"> </td>

                                                            <td> <select  class="form-control" name="bank_id[]">
                                                                    <option value=""></option>
                                                                    @foreach(\App\Models\Bank::all() as $f)
                                                                        <option {{old('bank_id')[$k]==$f->id?'selected':''}} value="{{$f->id}}">{{$f->name}}</option>
                                                                    @endforeach
                                                                </select> </td>
                                                          <td><input type="number" step="any" name="amount_check[]" value="{{old('amount_check')[$k]}}" class="form-control"></td>
                                                          <td><input type="text" name="date_from[]" value="{{old('date_from')[$k]}}" data-date-format="yyyy-mm-dd" class="form-control date-picker"></td>
                                                          <td><input type="text" name="date_to[]" value="{{old('date_to')[$k]}}" data-date-format="yyyy-mm-dd" class="form-control date-picker"></td>
                                                            <td><input type="text" name="notes[]" class="form-control"></td>
                                                            <td style="padding-top: 15px;"></td>
                                                        </tr>

                                                    @endforeach


                                                @else

                                                    <tr>
                                                        <td> <input type="text"   class="form-control" name="number[]"> </td>

                                                        <td> <select  class="form-control" name="bank_id[]">
                                                                <option value=""></option>
                                                                @foreach(\App\Models\Bank::all() as $f)
                                                                    <option  value="{{$f->id}}">{{$f->name}}</option>
                                                                @endforeach
                                                            </select> </td>
                                                        <td><input type="number" step="any" name="amount_check[]"  class="form-control"></td>
                                                        <td><input type="text" name="date_from[]"  data-date-format="yyyy-mm-dd" class="form-control date-picker"></td>
                                                        <td><input type="text" name="date_to[]"  data-date-format="yyyy-mm-dd" class="form-control date-picker"></td>
                                                        <td><input type="text" name="notes[]" class="form-control"></td>
                                                        <td style="padding-top: 15px;"></td>
                                                    </tr>



                                                @endif




                                                </tbody>

                                            </table>
                                            <a id="add_check"  class="btn btn-icon-only green">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
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
        $(document).on('click', '#add_check', function () {
            $.ajax({
                url: '{{url(AdminPath().'/add_new_chekline')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}'},
                beforeSend: function () {

                }, success: function (data) {
                    $('.new_ine').append(data);
                    $('.date_from').datepicker();
                    $('.date_to').datepicker();
                }
            });
        });




    </script>

@endsection
