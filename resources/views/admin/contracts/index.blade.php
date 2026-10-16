@extends(AdminCore())
@section('css')
    <link rel="stylesheet" href="{{url('orbscope/admin')}}/datatables/dataTables.bootstrap{{GetLangAdds()}}.css">
    <style>
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            position: unset !important;

        }
        .datepicker{

            width: fit-content;
        }
    </style>

@endsection
@section('content')
men
    <script src="{{url('orbscope/admin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('orbscope/admin/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('vendor/datatables/buttons.server-side.js')}}"></script>

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
                <div class="portlet-title" >
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-icon-only green" style="float: {{GetLanguage()=='ar'?'left':'right'}};">
                        <i class="fa fa-backward"></i>
                    </a>
                </div>

                <div class="portlet box green " style="margin-bottom: 68px;">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i> {{trans('orbscope.advanced_search')}} </div>
                        <div class="tools">
                            <a href="" style="color: white;background-image: none;" class="collapse" data-original-title="" title=""> <i class="fa fa-angle-down"></i> </a>
                            <a href="" style="color: white;background-image: none;" class="remove" data-original-title="" title=""> X </a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form role="form" method="get" action="{{url('admin/contracts/search')}}">
                            <div class="row">
                                <div class="form-group" >
                                <label class="col-md-2 control-label" for="date_from">{{trans('orbscope.date_range')}}</label>
                                <div class="col-md-10">
                                    <div class="input-group date-picker input-daterange"  data-date-format="yyyy-mm-dd" >
                                        {!! Form::text('date_from',$datefrom,['class'=>'date-picker form-control','placeholder'=>trans('orbscope.from')]) !!}
                                        <span class="input-group-addon"> {{trans('orbscope.to')}} </span>
                                        {!! Form::text('date_to',$date_to,['class'=>'date-picker form-control','placeholder'=>trans('orbscope.to'),'id'=>'date_to']) !!}
                                    </div>
                                </div>
                                </div>
                                <div class="form-group" style="margin-top: 40px;">
                                    <label class="col-md-2 control-label" for="country_id">{{trans('orbscope.unit')}} </label>
                                    <div class="col-md-4">
                                        <select class="form-control select2"  name="unit" id="unit" data-placeholder="{{trans('orbscope.unit')}}">
                                            <option></option>
                                            @foreach(\App\Models\Unit::all() as $country)
                                                <option {{old('city_id')==$country->id?'selected':''}}  value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label class="col-md-1 control-label" for="country_id">{{trans('orbscope.status')}} </label>
                                    <div class="col-md-2">
                                        <select class="form-control select2"  name="status" id="status" data-placeholder="{{trans('orbscope.status')}}">
                                            <option value=""></option>
                                            <option  value="progress">{{trans('front.progress')}}</option>
                                            <option  value="done">{{trans('front.done')}}</option>
                                            <option  value="canceled">{{trans('front.canceled')}}</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3" style="text-align: center;">
                                        <button type="submit" class="btn green-meadow">{{trans('orbscope.search')}} <i class="fa fa-search"></i></button>
                                    </div>
                                </div>

                            </div>

                        </form>


                    </div>
                </div>

                <div class="portlet-body">


                    {!! Form::open([
                       'method' => 'post',
                       'url' => [AdminPath().'/contracts/multi_delete']
                       ]) !!}
                    {!! $dataTable->table(['class'=> 'table table-striped table-bordered table-hover'],true) !!}


                </div>
            </div>
        </div>
        <script>

            $(document).on('click', '.createBtn', function() {
                window.location = "{{url('admin/contracts/create')}}";
            });
            $(document).on('click', '.deleteBtn', function() {
                $('#multi_delete').modal('show');
                var number_checkbox = $(".selected_data").filter(":checked").length;
                $('#count').html(number_checkbox);
                if(number_checkbox > 0){
                    $('.delete_done').show();
                    $('.check_delete').hide();
                }else{
                    $('.delete_done').hide();
                    $('.check_delete').show();
                }
            });
        </script>

        <div class="modal fade" id="multi_delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">x</button>
                        <h4 class="modal-title">{{trans('orbscope.delete')}} </h4>
                    </div>
                    <div class="modal-body">
                       <div class="delete_done"> {{trans('orbscope.ask-delete')}} <span id="count"></span> {{trans('orbscope.record')}} ! </div>
                        <div class="check_delete">{{trans('orbscope.check-delete')}}</div>
                    </div>
                    <div class="modal-footer">

                        {!! Form::submit(trans('orbscope.approval'), ['class' => 'btn btn-danger delete_done']) !!}
                        <a class="btn btn-default" data-dismiss="modal">{{trans('orbscope.cancel')}}</a>

                    </div>
                </div>
            </div>
        </div>

    </div>

    {!! $dataTable->scripts() !!}
    {!! Form::close() !!}
@endsection


