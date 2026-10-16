@extends(AdminCore())
@section('content')
    <style>
        @media print {
            .not_print {
                display: none;
            }
        }
    </style>
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('admin/financial_report')}}">{{trans('orbscope.financial_report')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>

            <li>
                <span>{{$title}}</span>
            </li>
        </ul>

    </div>
    <div class="portlet light bordered">


    <form method="post" action="{{url('/admin/save/deportation')}}">
        <input type="hidden" name="unit_id" value="{{$unit->id}}">
        @csrf
    <div class="row widget-row">


        <div class="col-md-12" lang="en">
            <!-- BEGIN WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">{{trans('orbscope.gross_income')}}</h4>

                <br/>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> {{trans('orbscope.user')}} </th>
                            <th> {{trans('orbscope.apartment')}} </th>
                            <th>  {{trans('orbscope.invoice_type')}} </th>
                            <th>  {{trans('orbscope.date')}} </th>
                            <th>  {{trans('orbscope.details')}} </th>
                            <th>  المبلغ </th>
                            <th class="not_print">  {{trans('orbscope.show')}} </th>

                        </tr>
                        </thead>
                        <tbody>
                      @foreach($income as $key=>$in)
                        <tr>
                            <input type="hidden" name="invoice_id[]" value="{{$in->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{@$in->flat->contract->user->name}}</td>
                            <td>{{@$in->flat->unit_number}}</td>
                            <td>{{@$in->invoicetype->name}}</td>
                            <td>{{$in->date}}</td>
                            <td>{{$in->details}}</td>
                            <td>{{$in->amount}}</td>
                            <td class="not_print"><a href="{{url('/admin/invoice/'.$in->id)}}">{{trans('orbscope.show')}}</a></td>

                        </tr>

                          @endforeach
                      <tr>
                          <td colspan="4" rowspan="2"> </td>
                          <td colspan="2">{{trans('orbscope.total')}}</td>
                          <td colspan="2">{{$netincome}}</td>
                      </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">{{trans('orbscope.total_expenses')}}</h4>

                <br/>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> {{trans('orbscope.apartment')}} </th>
                            <th>  {{trans('orbscope.invoice_type')}} </th>
                            <th>  {{trans('orbscope.date')}} </th>
                            <th>  {{trans('orbscope.details')}} </th>
                            <th>  المبلغ </th>
                            <th class="not_print">  {{trans('orbscope.show')}} </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($outcome as $key=>$in)
                            <tr>
                                <input type="hidden" name="invoice_id[]" value="{{$in->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{@$in->flat->unit_number}}</td>
                                <td>{{@$in->invoicetype->name}}</td>
                                <td>{{$in->date}}</td>
                                <td>{{$in->details}}</td>
                                <td>{{$in->amount}}</td>
                                <td class="not_print"><a href="{{url('/admin/invoice/'.$in->id)}}">{{trans('orbscope.show')}}</a></td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" rowspan="2"> </td>
                            <td colspan="2">{{trans('orbscope.total')}}</td>
                            <td colspan="2">{{$netoutcome}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <div class="row invoice-subtotal">
            <div class="col-xs-3">
                <h4 class="invoice-title uppercase">{{trans('orbscope.net')}}</h4>
                <p class="invoice-desc grand-total">{{$netincome - $netoutcome}} {{trans('orbscope.aed')}}</p>
                <input type="hidden" name="net" value="">
            </div>
            <div class="col-xs-3">
                <h4 class="invoice-title uppercase">{{trans('orbscope.administration_fees')}} </h4>
                <p class="invoice-desc">{{$fee}} {{trans('orbscope.aed')}}</p>
            </div>
            <div class="col-xs-3">
                <h4 class="invoice-title uppercase">ماتم تحويله للمالك </h4>
                <p class="invoice-desc">{{$transfer}} {{trans('orbscope.aed')}}</p>
            </div>
        </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12">

            <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">{{trans('orbscope.print')}}</a>
            <!--
           <button  type="submit" class="btn btn-lg green-haze hidden-print uppercase print-btn">إصدار تقرير</button>-->
       </div>
   </div>
   </form>
   </div>
@endsection



