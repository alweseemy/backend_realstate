@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('admin/agreements')}}">عرض جميع الاتفاقيات</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>{{$title}}</span>
            </li>
        </ul>

    </div>
    <div class="portlet light bordered">
        <ul class="nav nav-tabs nav-tabs-lg">


            <li>
                <a href="{{url(AdminPath().'/units/'.$unit->id)}}" >العقار </a>
            </li>

            <li @if(url(AdminPath().'/agreements/'.@$unit->argument->id) == URL::current()) class="active" @endif>
                <a href="{{url(AdminPath().'/agreements/'.@$unit->argument->id)}}" >معلومات الاتفاقية</a>
            </li>

            <li @if(url(AdminPath().'/units/'.$unit->id.'/flats') == URL::current()) class="active" @endif>
                <a href="{{url(AdminPath().'/units/'.$unit->id.'/flats')}}" >الوحدات العقارية  </a>
            </li>

            <li @if(url(AdminPath().'/units/'.$unit->id.'/deportation') == URL::current()) class="active" @endif>
                <a href="{{url(AdminPath().'/units/'.$unit->id.'/deportation')}}" >الترحيل  </a>
            </li>



        </ul>


    <form method="post" action="{{url('/admin/save/deportation')}}">
        <input type="hidden" name="unit_id" value="{{$unit->id}}">
        @csrf
    <div class="row widget-row">
        <div class="col-xs-12">
            <div class="mt-element-ribbon bg-grey-steel">
                <a href="{{url('admin/deportation/archives/'.$unit->id)}}" style="margin-bottom: 10px;" class="ribbon ribbon-round ribbon-color-primary uppercase"><i class="fa fa-files-o"></i> التقرير السابقة </a>
            </div>
        </div>

        <div class="col-md-12" lang="en">
            <!-- BEGIN WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">التحصيلات</h4>

                <br/>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th> ت </th>
                            <th> المستأجر </th>
                            <th> الوحدة </th>
                            <th>  النوع </th>
                            <th>  التاريخ </th>
                            <th>  التفاصيل </th>
                            <th>  المبلغ </th>

                        </tr>
                        </thead>
                        <tbody>
                      @foreach($income as $key=>$in)
                        <tr>
                            <input type="hidden" name="invoice_id[]" value="{{$in->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{@$in->flat->contract->user->name}}</td>
                            <td>{{@$in->flat->name}}</td>
                            <td>{{@$in->invoicetype->name}}</td>
                            <td>{{$in->date}}</td>
                            <td>{{$in->details}}</td>
                            <td>{{$in->amount}}</td>

                        </tr>

                          @endforeach
                      <tr>
                          <td colspan="4" rowspan="2"> </td>
                          <td colspan="2">المجموع</td>
                          <td colspan="2">{{$netincome}}</td>
                      </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">المصروفات</h4>

                <br/>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th> ت </th>
                            <th> الوحدة </th>
                            <th>  النوع </th>
                            <th>  التاريخ </th>
                            <th>  التفاصيل </th>
                            <th>  المبلغ </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($outcome as $key=>$in)
                            <tr>
                                <input type="hidden" name="invoice_id[]" value="{{$in->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{@$in->flat->name}}</td>
                                <td>{{@$in->invoicetype->name}}</td>
                                <td>{{$in->date}}</td>
                                <td>{{$in->details}}</td>
                                <td>{{$in->amount}}</td>

                            </tr>
                        @endforeach
                        <tr>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td>رسوم إدارة</td>
                            <td>{{$fee}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="2"> </td>
                            <td colspan="2">المجموع</td>
                            <td colspan="2">{{$netoutcome+$fee}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <div class="row invoice-subtotal">
            <div class="col-xs-3">
                <h4 class="invoice-title uppercase">مجموع الدخل</h4>
                <p class="invoice-desc">{{$netincome}}</p>
            </div>
            <div class="col-xs-3">
                <h4 class="invoice-title uppercase">مجموع المصروفات</h4>
                <p class="invoice-desc">{{$netoutcome+$fee}}</p>
            </div>
            <div class="col-xs-6">
                <h4 class="invoice-title uppercase">الصافي</h4>
                <p class="invoice-desc grand-total">{{$netincome - ($netoutcome+$fee)}}</p>
                <input type="hidden" name="net" value="{{$netincome - ($netoutcome+$fee)}}">
            </div>
        </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <!--
            <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>-->
            <button  type="submit" class="btn btn-lg green-haze hidden-print uppercase print-btn">إصدار تقرير</button>
        </div>
    </div>
    </form>
    </div>
@endsection



