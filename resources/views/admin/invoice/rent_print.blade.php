@extends(AdminCore())
@section('css')
    <link href="{{url('orbscope/admin')}}/assets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')



    <div class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-4">
                    <h3>اكسبرس للعقارات</h3>
                    <h4><i class="fa fa-phone"></i>:+97167442616</h4>
                    <h4><i class="fa fa-fax"></i>:2322</h4>
                    <h5>عجمان - ا.ع.م</h5>

                </div>
                <div class="col-xs-4 ">
                    <img style="height: 160px;margin-right: 20px;" src="{{ShowImage(GetSettings()->logo)}}">

                    <h4> ere.ajman@gmail.com <i class="fa fa-envelope"></i></h4>

                </div>
                <div class="col-xs-4">
                    <h3>EXPRESS realstate</h3>
                    <h4><i class="fa fa-phone"></i>:+97167442616</h4>
                    <h4><i class="fa fa-fax"></i>:2322</h4>
                    <h5>Ajman-U.A.E</h5>

                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4">
                        <h4>{{trans('orbscope.date')}} : {{$show->date}}</h4>


                    </div>
                    <div class="col-xs-8 ">
                        <h3>سند قبض</h3>
                        <h3>Receipt Voucher</h3>
                    </div>

                </div>
            </div>
            <hr/>
            <br/>
            <br/>
            <div class="row" style="margin-top: 250px;">
                <div class="col-xs-1">


                </div>
                <div class="col-xs-3">
                    <h4>استلمنا من السيد / السادة </h4>

                </div>

                    <div class="col-xs-4">
                        <h4>      {{@$show->contract->user->name}}</h4>

                    </div>

                <div class="col-xs-3">
                  <h4>Received From Mr/M/s</h4>
                </div>
                <div class="col-xs-1">

                </div>
            </div>
            <div class="row">
                <div class="col-xs-1">


                </div>
                <div class="col-xs-3">
                    <h4>مبلغ وقدره/ درهم </h4>

                </div>

                    <div class="col-xs-4">
                        <h4>      {{$show->amount}}</h4>

                    </div>


                <div class="col-xs-3">
                    <h4>The Sum of Dirhams</h4>
                </div>
                <div class="col-xs-1">

                </div>
            </div>
            <div class="row">


                    <table class="table table-bordered table-hover" style="width: auto;margin-{{GetLanguage()=='ar'?'right':'left'}}:20px;">
                        <thead>
                        <tr>
                            <th> {{trans('orbscope.bank_receipt_number')}} </th>
                            <th> {{trans('orbscope.bank_name')}} </th>
                            <th> {{trans('orbscope.amount_money')}} </th>
                            <th> {{trans('orbscope.date_range')}} {{trans('orbscope.from')}} </th>
                            <th> {{trans('orbscope.date_range')}} {{trans('orbscope.to')}} </th>
                            <th> {{trans('orbscope.status')}} </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach(@$show->contract->checks as $key=>$check)
                            <tr>
                                <td>{{$check->number}}</td>
                                <td>{{@$check->bank->name}}</td>
                                <td>{{$check->amount}}</td>
                                <td>{{$check->from_date}}</td>
                                <td>{{$check->to_date}}</td>
                                <td>{{trans('orbscope.'.$check->status)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
            <div class="row">

                <div class="col-xs-5" >
                    <h5 style="margin-{{GetLanguage()=='ar'?'right':'left'}}:20px;"">وذلك عن ايجار /عربون ل(شقة,محل,ارض,بناية) </h5>

                </div>

                <div class="col-xs-2">
                    <h5> {{@$show->unit->name}}  - {{@$show->flat->unit_number}} </h5>

                </div>


                <div class="col-xs-5">
                    <h5>Being for Rent/Advance (Flat,shop,land,Bldg)</h5>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-8 invoice-block" style="margin: 20px;">
                    <ul class="list-unstyled amounts">

                        <li>
                            <strong>{{trans('orbscope.Agreed')}} : {{$show->contract->price}} {{trans('orbscope.aed')}}</strong>

                        </li>

                        <li>
                            <strong>{{trans('orbscope.residual')}} : {{  @$show->contract->price - \App\Models\Invoice::where('contract_id',$show->contract_id)->sum('amount')}} {{trans('orbscope.aed')}}</strong>

                        </li>



                    </ul>
                    <br/>
                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                        <i class="fa fa-print"></i>
                    </a>

                </div>

            </div>
        </div>




@endsection
