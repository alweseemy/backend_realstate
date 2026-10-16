@extends(AdminCore())
@section('content')
    <link href="{{url('orbscope/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <link href="{{url('orbscope/admin/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{url('orbscope/admin/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>

    <div class='row'>
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-title">

                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>

                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/units')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}}   {{trans('orbscope.units')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}">
                        </a>
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-block alert-info fade in text-center">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <h4 class="alert-heading">{{trans('orbscope.imp_note')}}</h4>
                        <p> -  {{trans('orbscope.required_fields')}}</p>
                        <p>'unit_id' => {{trans('orbscope.unit')}} (integer ارقام فقط) <br/> 'flat_type_id' => {{trans('orbscope.flat_type')}} (integer ارقام فقط)  <br/> 'flat_number' => {{trans('orbscope.unit_number')}} (integer or string ارقام او حروف) <br/> 'area' => {{trans('orbscope.area')}} (integer ارقام فقط)  </p>


                        <p> Delimiter (',') </p>
                        <a href="{{url('uploads/apartments_example.csv')}}" class="btn green-meadow">{{trans('orbscope.click_here_to_get_example')}} <i class="fa fa-download"></i></a>
                    </div>

                </div>

                <div class="portlet-body form">
                    <div class="col-md-12">


                        <form action="{{ URL::to(AdminPath().'/apartments/upload/importExcel') }}" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="form-group">


                                    <label class="control-label col-md-2"> {{trans('orbscope.select_file')}} CSV <span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-10">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <span class="btn green btn-file">
                                                            <span class="fileinput-new">{{trans('orbscope.select_file')}} {{trans('orbscope.type_csv')}}</span>
                                                            <span class="fileinput-exists"> {{trans('orbscope.change')}} </span>
                                                            <input type="file" name="import_file" accept=".csv"> </span>
                                            <span class="fileinput-filename"> </span> &nbsp;
                                            <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue">{{trans('orbscope.upload')}} </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
@endsection


