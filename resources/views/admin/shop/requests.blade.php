@extends(AdminCore())
@section('content')
    <link rel="stylesheet" href="{{url('orbscope/admin')}}/datatables/dataTables.bootstrap{{GetLangAdds()}}.css">
    <script src="{{url('orbscope/admin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
    <script src="{{url('vendor/datatables/buttons.server-side.js')}}"></script>

    <div class='row'>
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">


                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/shop/create')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.add')}}  {{trans('orbscope.shop')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <div class="modal fade" id="myModal{{$show->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{trans('orbscope.delete')}} {{  $show->name }} !</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{trans('orbscope.ask-delete')}}  {{ $show->name }} !
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(['method' => 'DELETE','route' => ['shop.destroy', $show->id]]) !!}
                                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/shop')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.shop')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}">
                        </a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs nav-tabs-lg">
                            <li @if(url(AdminPath().'/shop/'.$show->id) == URL::current()) class="active" @endif>
                                <a href="{{url(AdminPath().'/shop/'.$show->id)}}" >{{trans('orbscope.shop_information')}}</a>
                            </li>

                            <li @if(url(AdminPath().'/shop/'.$show->id.'/get_category') == URL::current()) class="active" @endif>
                                <a href="{{url(AdminPath().'/shop/'.$show->id.'/get_category')}}" >{{trans('orbscope.category')}}</a>
                            </li>

                            <li @if(url(AdminPath().'/shop/'.$show->id.'/sub_category') == URL::current()) class="active" @endif>
                                <a href="{{url(AdminPath().'/shop/'.$show->id.'/sub_category')}}" >{{trans('orbscope.sub_category')}}</a>
                            </li>

                            <li @if(url(AdminPath().'/shop/'.$show->id.'/product') == URL::current()) class="active" @endif>
                                <a href="{{url(AdminPath().'/shop/'.$show->id.'/product')}}" >{{trans('orbscope.product')}}</a>
                            </li>


                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row static-info">
                                    <div class="col-md-12">
                                        {!! $dataTable->table(['class'=> 'table table-striped table-bordered table-hover'],true) !!}
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}
    {!! Form::close() !!}
@endsection
