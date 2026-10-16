
<div class="page-bar" style="background-color: #e7ecf1;">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
            <i class="fa fa-angle-left"></i>
        </li>
        @if(url(AdminPath().'/settings/') != URL::current())
        <li>
            <a href="{{url('/admin/settings')}}">{{trans('log.settings')}}</a>
            <i class="fa fa-angle-left"></i>
        </li>
        @endif
        <li>
            <span>{{$title}}</span>
        </li>
    </ul>

</div>
<ul class="nav nav-tabs nav-tabs-lg">
    <li @if(url(AdminPath().'/settings/') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/settings/')}}" > {{trans('log.settings')}}  <i class="fa fa-cog"></i></a>
    </li>
    <li @if(url(AdminPath().'/cities') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/cities')}}" >{{trans('orbscope.cities')}}  <i class="icon-direction"></i></a>
    </li>
    <li @if(url(AdminPath().'/hoods') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/hoods')}}" >{{trans('orbscope.hoods')}}  <i class="icon-direction"></i></a>
    </li>

    <li @if(url(AdminPath().'/unitTypes') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/unitTypes')}}" >{{trans('orbscope.unitTypes')}}   <i class="fa fa-building-o"></i></a>
    </li>
    <li @if(url(AdminPath().'/flat_type') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/flat_type')}}" >{{trans('orbscope.flat_types')}}   <i class="fa fa-building-o"></i></a>
    </li>

    <li @if(url(AdminPath().'/order_type') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/order_type')}}" > {{trans('orbscope.maintenance_types')}}  <i class="fa fa-server"></i></a>
    </li>
    <li @if(url(AdminPath().'/services') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/services')}}" >{{trans('orbscope.services')}} <i class="fa fa-server"></i></a>
    </li>
    <li @if(url(AdminPath().'/invoicetype') == URL::current()) class="active" @endif>
        <a href="{{url(AdminPath().'/invoicetype')}}" >{{trans('orbscope.invoice_types')}} <i class="fa fa-dollar"></i></a>
    </li>

</ul>

