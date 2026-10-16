@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/payments')}}">الفواتير المدفوعة</a>
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


                        <div class="row">

                            <br>
                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <strong>فاتورة رقم:</strong>
                                    {{@$show->invoce_number}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> العقار : </strong>
                                        <a href="{{url(AdminUrl('Units/'.@$show->unit_id))}}"> {{@$show->unit->name}} </a>
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> ألوحدة : </strong>
                                    <a href="{{url(AdminUrl('flats/'.@$show->flat_id))}}"> {{@$show->flat->name}} </a>
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong>الماللك:</strong>
                                    {{@$show->owner->name}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong>المستأجر:</strong>
                                    {{@$show->user->name}}
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong> تاريخ :</strong>
                                    {{$show->date}}
                                    <br><hr>
                                </div>




                                <div class="col-md-6">
                                    <strong> رسوم الكهرباء : </strong>
                                    {{round($show->electricity_fee)}} ريال
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> رسوم الغاز : </strong>
                                    {{round($show->gas_fee)}} ريال
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> رسوم المياه : </strong>
                                    {{round($show->water_fee)}} ريال
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> رسوم اخري : </strong>
                                    {{round($show->other_fees)}} ريال
                                    <br><hr>
                                </div>
                                @if($show->amount != null && !empty($show->amount))
                                <div class="col-md-6">
                                    <strong> رسوم الايجار :</strong>
                                    {{round($show->amount - $net)}}   ريال
                                    <br><hr>
                                </div>
                                @endif

                                <div class="col-md-6">
                                    <strong> المجموع :</strong>
                                    {{$show->amount}}   ريال
                                    <br><hr>
                                </div>

                                <div class="col-md-12">
                                    <strong> التفاصيل :</strong>
                                    {{$show->details}}
                                    <br><hr>
                                </div>







                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
