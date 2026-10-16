@extends(AdminCore())
@section('content')
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('admin/invoice')}}">{{trans('orbscope.invoices')}}</a>
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ url(AdminPath().'/invoice/'.$show->id.'/edit')}}"
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
                                       'route' => ['invoice.destroy', $show->id]
                                       ]) !!}
                                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/invoice/')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.invoices')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}">
                        </a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="">
                            {{trans('orbscope.back')}} <i class="fa fa-backward"></i>
                        </a>
                    </div>
                </div>


                <div class="portlet-body form" lang="en">
                    <div class="col-md-12">


                        <div class="row">

                            <br>
                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.unit')}} : </strong>
                                        <a href="{{url(AdminUrl('Units/'.@$show->unit_id))}}"> {{@$show->unit->name}} </a>
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.apartment')}} : </strong>
                                    <a href="{{url(AdminUrl('flats/'.@$show->flat_id))}}"> {{@$show->flat->flattype->name}} {{@$show->flat->unit_number}} </a>
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.invoice_type')}}:</strong>
                                    {{@$show->invoicetype->name}}
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.date')}} :</strong>
                                    {{$show->date}}
                                    <br><hr>
                                </div>

                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.type')}} :</strong>
                                    {{trans('orbscope.'.$show->money_type)}}
                                    <br><hr>
                                </div>


                                <div class="col-md-6">
                                    <strong> {{trans('orbscope.amount_money')}} :</strong>
                                    {{$show->amount}}
                                    <br><hr>
                                </div>

                                @if($show->money_type=='bank_receipt')
                                    <div class="col-md-6">
                                        <strong> {{trans('orbscope.bank_receipt_number')}} :</strong>
                                        {{$show->bank_receipt_number}}
                                        <br><hr>
                                    </div>

                                    <div class="col-md-6">
                                        <strong> {{trans('orbscope.bank_name')}} :</strong>
                                        {{@$show->bank->name}}
                                        <br><hr>
                                    </div>


                               @endif

                                <div class="col-md-12">
                                    <strong> {{trans('orbscope.details')}} :</strong>
                                    {{$show->details}}
                                    <br><hr>
                                </div>
                                <div class="col-md-12">
                                @if($show->image != null)
                                    <div class="card-body" >
                                        <div class="card-title">{{trans('orbscope.attachments')}} </div>
                                        <div class="col-md-12">
                                            <div class="carousel-inner" role="listbox">
                                                @foreach(explode('|',$show->image) as $key => $image)
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
                                @endif
                                </div>


                                <a href="{{url('admin/invoice/'.$show->id.'/print')}}" class="btn btn-lg blue hidden-print margin-bottom-5"> {{trans('orbscope.print')}}
                                    <i class="fa fa-print"></i>
                                </a>



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
