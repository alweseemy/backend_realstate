@extends(AdminCore())
@section('content')

    <link href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet"type="text/css"/>
    <div class="page-bar" style="background-color: #e7ecf1;">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/units')}}">{{trans('orbscope.units')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url('/admin/units/'.$unit->id.'/flats')}}">{{trans('orbscope.apartments')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>{{$title}}</span>
            </li>
        </ul>

    </div>
    <div class="row widget-row">
        <div class="col-md-12">
            <form method="post" action="{{url('admin/update/multi_edit')}}">
                @csrf
                    <input type="hidden" name="unit_id" value="{{$unit->id}}">
            <!-- BEGIN WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 ">
                <h4 class="widget-thumb-heading">{{$title}}</h4>

                <br/>
                <table class="table table-bordered table-hover" style="overflow-y:scroll;display:block;" id="myTable">
                    <thead>
                    <tr>
                        <th>{{trans('orbscope.unit_number')}} </th>
                        <th>{{trans('orbscope.area')}}  </th>
                        <th>{{trans('orbscope.water_meter')}} </th>
                        <th>{{trans('orbscope.electric_meter')}}  </th>
                        <th>{{trans('orbscope.bedrooms')}} </th>
                        <th>{{trans('orbscope.hall')}}  </th>
                        <th>{{trans('orbscope.bathrooms')}} </th>
                        <th>{{trans('orbscope.floor')}} </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($flats as $f)
                        <tr>
                            <input type="hidden" name="flat_id[]" value="{{$f->id}}">
                            <td><input type="text" required name="unit_number[]" value="{{$f->unit_number}}"></td>
                            <td><input type="number"  name="area[]" value="{{$f->area}}"></td>
                            <td><input type="number"  name="electric[]" value="{{$f->electric}}"></td>
                            <td><input type="number" name="water[]" value="{{$f->water}}"></td>
                            <td><input type="number"  name="room[]" value="{{$f->room}}"></td>
                            <td><input type="number"  name="hall[]" value="{{$f->hall}}"></td>
                            <td><input type="number"   name="bathroom[]" value="{{$f->bathroom}}"></td>
                            <td><input type="number" name="floor[]" value="{{$f->floor}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END WIDGET THUMB -->
            <br/>
            <div class="form-actions right1">
                <button type="submit" name="action" value="save"  class="btn green">{{trans('orbscope.save')}}</button>

                <a href="{{url('/admin/units/'.$unit->id.'/flats')}}" class="btn default">{{trans('orbscope.cancel')}}</a>
            </div>
            </form>
        </div>


    </div>


    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
                "language": {
                    "lengthMenu": "{{trans('orbscope.the_number_results_per_page')}} _MENU_",
                    "zeroRecords": "لا يتوفر اي نتائج",
                    "info": "{{trans('orbscope.start_from')}} _PAGE_ {{trans('orbscope.to')}} _PAGES_",
                    "infoEmpty": "لا يتوفر اي نتائج",
                    "infoFiltered": "(الفلتره from _MAX_ total )",
                    "search": " {{trans('orbscope.search')}} ",
                    "paginate": {
                        "first": "الأول",
                        "previous": "{{trans('orbscope.previous')}}",
                        "next": "{{trans('orbscope.next')}}",
                        "last": "الأخير"
                    },
                    "loadingRecords": "جارٍ التحميل...",
                }
            } );
        } );
    </script>
@endsection



