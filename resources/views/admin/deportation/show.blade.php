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
                <a href="{{url('admin/units/'.$unit->id.'/deportation')}}">الترحيل</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>{{$title}}</span>
            </li>
        </ul>

    </div>

    <link href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet"type="text/css"/>

    <div class="row widget-row">
        <div class="col-md-12">
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
            <!-- BEGIN WIDGET THUMB -->
            <div  style="    background-color: #f1f1f3c7;"  class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-35 " lang="en">
                <h4 class="widget-thumb-heading">{{$title}}</h4>
                <br/>
                <table class="table table-bordered table-hover" id="myTable">
                    <thead>
                    <tr>
                        <th> رقم التقرير </th>
                        <th> صافي المبلغ </th>
                        <th> عرض </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $r)
                        <tr>
                           <td>{{$r->report_id}}</td>
                           <td>{{\App\Models\Deportation::where('report_id',$r->report_id)->first()->amount}}</td>
                            <td><a href="{{url('/admin/deportation/report/'.$r->report_id)}}">عرض</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
    </div>


    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
                "language": {
                    "lengthMenu": "عدد النتائج بالصفحة _MENU_",
                    "zeroRecords": "لايوجد شئ - اسف",
                    "info": "اظهار الصفحات من _PAGE_ الي _PAGES_",
                    "infoEmpty": "لا يتوفر اي نتائج",
                    "infoFiltered": "(الفلتره from _MAX_ total )",
                    "search": " بحث ",
                    "paginate": {
                        "first": "الأول",
                        "previous": "السابق",
                        "next": "التالي",
                        "last": "الأخير"
                    },
                    "loadingRecords": "جارٍ التحميل...",
                }
            } );
        } );
    </script>
@endsection



