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
                <div class="portlet-title not_print">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ url(AdminPath().'/contracts/'.$show->id.'/edit')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.edit')}}  ">
                            <i class="fa fa-edit"></i>
                        </a>

                        <span data-toggle="tooltip" title="{{trans('orbscope.delete')}}">

                        <a data-toggle="modal" data-target="#myModal{{$show->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


                        <div class="modal fade" id="myModal{{$show->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{trans('orbscope.delete')}}  !</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{trans('orbscope.ask-delete')}}
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([
                                       'method' => 'DELETE',
                                       'route' => ['contracts.destroy', $show->id]
                                       ]) !!}
                                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/contracts/')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.lease_contracts')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}">
                        </a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="رجوع">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                        <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                            <i class="fa fa-print"></i>
                        </a>
                    </div>
                </div>


                @if($show->cnaceled_details != null)
                    <div class="note note-danger">
                        <h4 class="block">{{trans('orbscope.reason_cancellation')}}</h4>
                        <p>
                            {{$show->cnaceled_details}}
                        </p>


                        @if($show->canceled_images != null)
                               <br/>
                               <br/>
                                <div class="card-body" >
                                    <div class="card-title">{{trans('orbscope.attachments')}} </div>

                                        <div class="carousel-inner" role="listbox">
                                            @foreach(explode('|',$show->canceled_images) as $key => $image)
                                                {{getTypeFile(getEx($image))['fileType']}}
                                                <strong>
                                                    {{trans('orbscope.file')}} : <i class="fa {{getTypeFile(getEx($image))['fileIcon']}}" aria-hidden="true"></i>  {{$image}}
                                                </strong>

                                                <a  href="{{url('uploads/'.$image)}}" style="margin: 3px;" class="btn btn-success m-1">
                                                    <i class="fa fa-eye"></i> {{trans('orbscope.view')}}
                                                </a>
                                                <br>
                                                <hr>
                                            @endforeach
                                        </div>

                                </div>

                        @endif


                    </div>

                @endif

                <!--
                <ul class="nav nav-tabs nav-tabs-lg">

                    <li @if(url(AdminPath().'/contracts/'.$show->id) == URL::current()) class="active" @endif>
                        <a href="{{url(AdminPath().'/contracts/'.$show->id)}}" >معلومات الاتفاقية</a>
                    </li>

                    <li>
                        <a href="{{url(AdminPath().'/units/'.$show->unit_id)}}" >العقار </a>
                    </li>



                </ul>-->

                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        <div class="row">

                            <br>
                            <div class="col-md-12">
                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.contract_number')}} : </strong>
                                    {{$show->contract_number}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.status')}} : </strong>
                                    {{trans('front.'.$show->status)}}
                                    <br><hr>
                                </div>


                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.unit')}} : </strong>
                                       {{@$show->unit->name}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.apartment')}} : </strong>
                                    {{@$show->flat->unit_number}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.owner')}} : </strong>
                                     {{@$show->owner->name}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.user')}} : </strong>
                                      {{@$show->user->name}}
                                    <br><hr>
                                </div>


                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.start_date')}} :</strong>
                                    {{date("Y-m-d",$show->start_date)}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.end_date')}} :</strong>
                                    {{date("Y-m-d",$show->end_date)}}
                                    <br><hr>
                                </div>
                               <!---
                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.date_range')}} : </strong>
                                    {{$show->month}} {{trans('orbscope.month')}}
                                    <br><hr>
                                </div>-->

                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.annual_rent_amount')}} : </strong>
                                    {{$show->amount}} {{trans('orbscope.aed')}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.tax_percentage')}} : </strong>
                                    {{$show->insurance}} %
                                    <br><hr>
                                </div>
                               @if($show->insurance != 0)
                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.tax_value')}} : </strong>
                                    {{  ($show->amount * $show->insurance/100)}} {{trans('orbscope.aed')}}
                                    <br><hr>
                                </div>
                                @endif

                                <div class="col-xs-6">
                                    <strong> {{trans('orbscope.previous_indebtedness')}} : </strong>
                                    {{$show->credit_amount}} {{trans('orbscope.aed')}}
                                    <br><hr>
                                </div>



                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.total')}} : </strong>
                                    {{$show->price}} {{trans('orbscope.aed')}}
                                    <br><hr>
                                </div>
                               @if($show->garage_id != null)
                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.garage')}} : </strong>
                                     {{@$show->garage->unit_number}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.garage_rent_amount')}} : </strong>
                                    {{$show->garage_rent_amount}} {{trans('orbscope.aed')}}
                                    <br><hr>
                                </div>
                                @endif



                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.rental_cycle')}} : </strong>
                                    {{trans('orbscope.'.$show->period)}}
                                    <br><hr>
                                </div>

                                <div class="col-xs-6">
                                    <strong>{{trans('orbscope.insurance')}} : </strong>
                                    {{trans('orbscope.'.$show->unit_insurance_type)}}
                                    <br><hr>
                                </div>
                                 @if($show->unit_insurance_value != null)
                                    @if($show->unit_insurance_type =='cash_money')
                                        <div class="col-xs-6">

                                            <strong>{{trans('orbscope.amount_money')}} : </strong>

                                            {{$show->unit_insurance_value}}
                                            <br><hr>
                                        </div>

                                    @else
                                        <div class="col-xs-4">

                                                <strong>{{trans('orbscope.bank_receipt')}} : </strong>

                                           {{$show->unit_insurance_value}}
                                            <br><hr>
                                        </div>

                                        <div class="col-xs-4">

                                            <strong>{{trans('orbscope.amount_money')}} : </strong>

                                            {{$show->amount_bank}}
                                            <br><hr>
                                        </div>

                                       <div class="col-xs-4">

                                            <strong>{{trans('orbscope.bank_name')}} : </strong>

                                            {{@$show->bank->name}}
                                            <br><hr>
                                        </div>
                                    @endif
                               @endif

                                <div class="col-xs-12">
                                    <strong>{{trans('orbscope.details')}} {{@$show->flat->flatType->name}}: </strong>
                                    <br/>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>

                                                <th> {{trans('orbscope.area')}} </th>
                                                <th> {{trans('orbscope.hall')}} </th>
                                                <th> {{trans('orbscope.bathrooms')}} </th>
                                                <th> {{trans('orbscope.bedrooms')}} </th>
                                                <th> {{trans('orbscope.floor')}} </th>
                                                <th> {{trans('orbscope.electric_meter')}} </th>
                                                <th> {{trans('orbscope.water_meter')}} </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                                <td> {{@$show->flat->area}} </td>
                                                <td> {{@$show->flat->hall}}</td>
                                                <td> {{@$show->flat->bathroom}}</td>
                                                <td> {{@$show->flat->room}} </td>
                                                <td> {{@$show->flat->floor}} </td>
                                                <td> {{@$show->flat->electric}} </td>
                                                <td> {{@$show->flat->water}} </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <strong>{{trans('orbscope.terms_conditions')}} : </strong>
                                    <br/>
                                    <p>{{$show->details}}</p>
                                    <br><hr>
                                </div>
                                <div class="col-md-12 not_print">
                                    <span><strong>{{trans('orbscope.rent_bills')}} : </strong></span>
                                    <a  href="{{url('/admin/payment/'.$show->id.'/amount')}}" style="float: {{GetLanguage()=='ar'?'left':'right'}};margin-bottom: 10px;" type="submit" class="btn green"><i class="fa fa-plus"></i>{{trans('orbscope.add')}} {{trans('orbscope.invoice')}}</a>

                                    <br/>
                                    <div class="table-scrollable">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> {{trans('orbscope.date')}}</th>
                                                <th>{{trans('orbscope.amount_money')}}</th>
                                                <th> {{trans('orbscope.show')}} </th>
                                                <th> {{trans('orbscope.edit')}} </th>
                                                <th> {{trans('orbscope.print')}} </th>
                                                <th> {{trans('orbscope.delete')}} </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(@$invo->get() as $key=>$p)
                                            <tr>
                                               <td>{{$key+1}}</td>
                                               <td>{{$p->date}}</td>
                                               <td>{{$p->amount}}</td>
                                                <td> <a  class="btn green" href="{{url('/admin/invoice/'.$p->id)}}">{{trans('orbscope.show')}} </a> </td>
                                                <td> <a  class="btn btn-warning" href="{{url('/admin/invoice/'.$p->id.'/edit')}}">{{trans('orbscope.edit')}}</a> </td>
                                                <td>
                                                    <a  class="btn" href="{{url('/admin/rent_invoice/'.$p->id.'/print')}}">{{trans('orbscope.print')}}</a>
                                                    <!--
                                                    <a  class="btn" href="{{url('/admin/invoice/'.$p->id.'/pdf')}}">PDF</a>-->


                                                </td>
                                                <td> <a data-toggle="modal" data-target="#myModal{{$p->id}}" href="#" class="btn btn-danger">{{trans('orbscope.delete')}}</a>
                                                    <div class="modal fade" id="myModal{{$p->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button class="close" data-dismiss="modal">x</button>
                                                                    <h4 class="modal-title">{{trans('orbscope.delete')}} {{trans('orbscope.invoice')}} ! </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{trans('orbscope.ask-delete')}} : {{trans('orbscope.invoice')}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    {!! Form::open([
                                                                   'method' => 'DELETE',
                                                                   'route' => ['invoice.destroy', $p->id]
                                                                   ]) !!}
                                                                    {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                                                    <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> </td>
                                            </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">

                                        <div class="col-xs-6 invoice-block">
                                            <br/>
                                            <ul class="list-unstyled amounts">
                                                <li>
                                                    <strong>{{trans('orbscope.total_amounts_paid')}}:</strong> {{$invo->sum('amount')}} </li><br/>
                                                <li>
                                                    <strong>{{trans('orbscope.residual')}}:</strong> {{  $show->price - $invo->sum('amount')}} </li>

                                            </ul>

                                        </div>
                                        <!--
                                        <div class="col-xs-6 invoice-block">

                                            <a  class="btn yellow-crusta" href="{{url('/admin/contract/'.$show->id.'/pdf')}}">تنزيل pdf لجميع الدفعات</a>
                                        </div>--->
                                    </div>
                                    <br/>
                                    <br/>

                                    <span><strong>{{trans('orbscope.checks')}} : </strong></span>
                                    <div class="table-scrollable">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> {{trans('orbscope.bank_receipt_number')}} </th>
                                                <th> {{trans('orbscope.bank_name')}} </th>
                                                <th> {{trans('orbscope.amount_money')}} </th>
                                                <th> Due date </th>
                                                <th> {{trans('orbscope.date_range')}} {{trans('orbscope.to')}} </th>
                                                <th> {{trans('orbscope.details')}} </th>
                                                <th> {{trans('orbscope.status')}} </th>
                                                <th> {{trans('orbscope.edit')}} </th>
                                                <th> {{trans('orbscope.delete')}} </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach(@$show->checks as $key=>$check)
                                              <tr>
                                                  <td>{{$check->number}}</td>
                                                  <td>{{@$check->bank->name}}</td>
                                                  <td>{{$check->amount}}</td>
                                                  <td>{{$check->from_date}}</td>
                                                  <td>{{$check->to_date}}</td>
                                                  <td>{{$check->details}}</td>
                                                  <td>{{trans('orbscope.'.$check->status)}}</td>
                                                  <td>
                                                      @if($check->status !='received')
                                                      <a href="{{url('/admin/checks/'.$check->id.'/edit')}}">{{trans('orbscope.edit')}}</a>
                                                      @endif
                                                  </td>
                                                  <td>
                                                      <a style="color: red;" href="{{url('/admin/checks/'.$check->id.'/delete')}}">{{trans('orbscope.delete')}}</a>
                                                  </td>
                                              </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>




                                    <!--
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="col-md-2"><strong>{{trans('orbscope.images')}} : </strong></div>
                                        <div class="col-md-10">
                                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >


                                                <div class="carousel-inner" role="listbox">

                                                        <div class="item{ key == 0 ? ' active' : '' }}">
                                                            <img width="100%" src="{ShowImage($image)}}">
                                                        </div>

                                                </div>

                                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>-->

                                @if($show->images != null)
                                    <div class="col-md-12 not_print">
                                        <br/>
                                        <br/>
                                    <div class="card-body" >
                                        <div class="card-title">{{trans('orbscope.attachments')}} </div>
                                        <div class="col-md-12">
                                            <div class="carousel-inner" role="listbox">
                                                @foreach(explode('|',$show->images) as $key => $image)
                                                    {{getTypeFile(getEx($image))['fileType']}}
                                                    <strong>
                                                        {{trans('orbscope.file')}} : <i class="fa {{getTypeFile(getEx($image))['fileIcon']}}" aria-hidden="true"></i>  {{$image}}
                                                    </strong>

                                                    <a  href="{{url('uploads/'.$image)}}" style="margin: 3px;" class="btn btn-success m-1">
                                                        <i class="fa fa-eye"></i> {{trans('orbscope.view')}}
                                                    </a>
                                                    <br>
                                                    <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                @endif


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
