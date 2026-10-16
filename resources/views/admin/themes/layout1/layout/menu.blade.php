<script>
    $(document).ready(function () {
        var search = $("#search_menu").quicksearch("li");
    });
</script>
<!-- BEGIN SIDEBAR -->

<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">



        <div style="margin: 10px;padding: 0px" class="form-group form-md-line-input has-info sidebar-search-wrapper">
            <div class="input-group">
                <input type="text" class="form-control" id="search_menu" placeholder="{{trans('orbscope.search_menu')}}">
                <span class="input-group-addon">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>

            <li class="nav-item start {{ActiveLink(url(AdminPath().'/'))}}">
                <a href="{{url(AdminPath())}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('orbscope.dashboard')}}</span>
                    <span class="selected"></span>
                </a>
            </li>



            @can('Rent')

                <li class="nav-item {{ (request()->is('admin/customer*')) ? 'active' : '' }} {{ActiveLink(url('admin/upload/customer'))}}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">{{trans('orbscope.customers')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/customer/create'))}}">
                            <a href="{{url(AdminUrl('customer/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.customer')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/customer'))}}">
                            <a href="{{url(AdminUrl('customer'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.customers')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ActiveLink(url('admin/upload/customer'))}}">
                            <a href="{{url(AdminUrl('upload/customer'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.upload')}} {{trans('orbscope.customers')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

            <li class="nav-item {{ (request()->is('admin/units*')) ? 'active' : '' }}  {{ (request()->is('admin/service_contracts*')) ? 'active' : '' }}  {{ (request()->is('admin/flats*')) ? 'active' : '' }} {{ActiveLink(url('admin/upload/units'),url('admin/upload/apartments'))}}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-building-o"></i>
                        <span class="title">{{trans('orbscope.units')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/units/create'))}}">
                            <a href="{{url(AdminUrl('units/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.unit')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/units'))}}">
                            <a href="{{url(AdminUrl('units'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.units')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/service_contracts/create'))}}">
                            <a href="{{url(AdminUrl('service_contracts/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.service_contracts')}}</span>
                            </a>
                        </li>


                        <li class="nav-item {{ActiveLink(url('admin/upload/units'))}}">
                            <a href="{{url(AdminUrl('upload/units'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.upload')}} {{trans('orbscope.units')}}</span>
                            </a>
                        </li>


                        <li class="nav-item {{ActiveLink(url('admin/upload/apartments'))}}">
                            <a href="{{url(AdminUrl('upload/apartments'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.upload')}} {{trans('orbscope.apartments')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item {{ (request()->is('admin/agreements*')) ? 'active' : '' }}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-files-o"></i>
                        <span class="title">{{trans('orbscope.management_contracts')}}</span>
                        <span class="arrow {{ ActiveLink('agreements') }}"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/agreements/create'))}}">
                            <a href="{{url(AdminUrl('agreements/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.management_contract')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/agreements'))}}">
                            <a href="{{url(AdminUrl('agreements'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.management_contracts')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item {{ (request()->is('admin/contracts*')) ? 'active' : '' }}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-files-o"></i>
                        <span class="title">{{trans('orbscope.lease_contracts')}}</span>
                        <span class="arrow {{ ActiveLink('contracts') }}"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/contracts/create'))}}">
                            <a href="{{url(AdminUrl('contracts/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.lease_contract')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/contracts'))}}">
                            <a href="{{url(AdminUrl('contracts'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.lease_contracts')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ (request()->is('admin/money_transfers*')) ? 'active' : '' }}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-dollor"></i>
                        <span class="title">{{trans('orbscope.money_transfers')}}</span>
                        <span class="arrow {{ ActiveLink('money_transfers') }}"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/money_transfers/create'))}}">
                            <a href="{{url(AdminUrl('money_transfers/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.transfer')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/money_transfers'))}}">
                            <a href="{{url(AdminUrl('money_transfers'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.transfers')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-files-o"></i>
                        <span class="title">{{trans('orbscope.maintenance')}}</span>
                        <span class="arrow {{ ActiveLink('orders') }}"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/orders/create'))}}">
                            <a href="{{url(AdminUrl('orders/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.order')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/orders'))}}">
                            <a href="{{url(AdminUrl('orders'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.orders')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ (request()->is('admin/invoice*')) ? 'active' : '' }} {{ActiveLink(url('admin/financial_report'))}}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-files-o"></i>
                        <span class="title">{{trans('orbscope.invoices')}}</span>
                        <span class="arrow {{ ActiveLink(url('admin/invoice')) }}"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/invoice/create'))}}">
                            <a href="{{url(AdminUrl('invoice/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.invoice')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/invoice'))}}">
                            <a href="{{url(AdminUrl('invoice'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.invoices')}}</span>
                            </a>
                        </li>

                        <li class="nav-item  {{ActiveLink(url('admin/financial_report'))}}">
                            <a href="{{url(AdminUrl('financial_report'))}}" class="nav-link ">
                                <span class="title"> {{trans('orbscope.financial_report')}}</span>
                            </a>
                        </li>
                      <!--
                        <li class="nav-item  {{ActiveLink(url('admin/payments'))}}">
                            <a href="{{url(AdminUrl('payments'))}}" class="nav-link ">
                                <span class="title"> فواتير الإيجار المدفوعة</span>
                            </a>
                        </li>-->

                    </ul>
                </li>

                <li class="nav-item {{ActiveLink(url(AdminPath().'/follow_up'))}}">
                    <a href="{{url(AdminPath().'/follow_up')}}" class="nav-link nav-toggle">
                        <i class="fa fa-cog"></i>
                        <span class="title">{{trans('orbscope.follow_up')}}</span>
                        <span class="selected"></span>
                    </a>
                </li>



                <li class="nav-item {{ ActiveLink(url('admin/reports'),url('admin/comprehensive_report')) }}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-files-o"></i>
                        <span class="title">{{trans('orbscope.reports')}}</span>
                        <span class="arrow {{ ActiveLink('reports') }}"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/reports'))}}">
                            <a href="{{url(AdminUrl('reports'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.reports')}} </span>
                            </a>
                        </li>

                        <li class="nav-item {{ActiveLink(url('admin/checks/reports'))}}">
                            <a href="{{url(AdminUrl('checks/reports'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.checks')}} </span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/comprehensive_report'))}}">
                            <a href="{{url(AdminUrl('comprehensive_report'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.comprehensive_report')}} </span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item {{ (request()->is('admin/contact_users*')) ? 'active' : '' }} {{ (request()->is('admin/usersContact*')) ? 'active' : '' }}">
                    <a href="{{url(AdminPath().'/contact_users')}}" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">{{trans('orbscope.communication_clients')}}</span>
                        <span class="selected"></span>
                    </a>
                </li>


            @endcan
            @can('Settings')

                <li class="heading">
                    <h3 class="uppercase">{{trans('log.settings')}}</h3>
                </li>

                <li class="nav-item {{ActiveLink(url(AdminPath().'/settings'))}} {{ (request()->is('admin/cities*')) ? 'active' : '' }} {{ (request()->is('admin/unitTypes*')) ? 'active' : '' }}  {{ (request()->is('admin/services*')) ? 'active' : '' }} {{ (request()->is('admin/order_type*')) ? 'active' : '' }} {{ (request()->is('admin/flat_type*')) ? 'active' : '' }} {{ (request()->is('admin/hoods*')) ? 'active' : '' }}">
                    <a href="{{url(AdminPath().'/settings')}}" class="nav-link nav-toggle">
                        <i class="fa fa-cog"></i>
                        <span class="title">{{trans('log.settings')}}</span>
                        <span class="selected"></span>
                    </a>
                </li>










                <li class="nav-item {{ (request()->is('admin/users*')) ? 'active' : '' }}">
                    <a href="javascript:" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">{{trans('orbscope.users')}}</span>
                        <span class="arrow {{ ActiveLink('users') }}"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item {{ActiveLink(url('admin/users/create'))}}">
                            <a href="{{url(AdminUrl('users/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('front.user')}}</span>
                            </a>
                        </li>


                        <li class="nav-item  {{ActiveLink(url('admin/users'))}}">
                            <a href="{{url(AdminUrl('users'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.users')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item {{ (request()->is('admin/maintenance_form*')) ? 'active' : '' }}">
                    <a href="{{url(AdminPath().'/maintenance_form')}}" class="nav-link nav-toggle">
                        <i class="fa fa-files-o"></i>
                        <span class="title">{{trans('front.maintenance_request_forms')}}</span>
                        <span class="selected"></span>
                    </a>
                </li>


                <li class="nav-item {{ActiveLink(url(AdminPath().'/trached'))}}">
                    <a href="{{url(AdminPath().'/trached')}}" class="nav-link nav-toggle">
                        <i class="fa fa-cog"></i>
                        <span class="title">{{trans('orbscope.trash')}}</span>
                        <span class="selected"></span>
                    </a>
                </li>


            @endcan

            <!--
            @if (auth()->user()->can('Roles'))
                <li class="heading">
                    <h3 class="uppercase">{{trans('orbscope.roles')}}</h3>
                </li>

                <li class="nav-item {{ ActiveLink(url('/admin/roles'),url('/admin/roles/create')) }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-globe-alt"></i>
                        <span class="title">{{trans('orbscope.roles')}}</span>
                        <span class="arrow {{ ActiveLink('roles') }}"></span>
                    </a>
                    <ul class="sub-menu">

                            <li class="nav-item {{ ActiveLink(url('/admin/roles/create')) }}">
                                <a href="{{url(AdminUrl('roles/create'))}}" class="nav-link ">
                                    <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.roles')}}</span>
                                </a>
                            </li>

                            <li class="nav-item  {{ ActiveLink(url('/admin/roles')) }}">
                                <a href="{{url(AdminUrl('roles'))}}" class="nav-link ">
                                    <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.roles')}}</span>
                                </a>
                            </li>
                    </ul>
                </li>

                <li class="nav-item {{ ActiveLink(url('/admin/permissions'),url('/admin/permissions/create')) }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-globe-alt"></i>
                        <span class="title">{{trans('orbscope.permissions')}}</span>
                        <span class="arrow {{ ActiveLink('permissions') }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ ActiveLink(url('/admin/permissions/create')) }}">
                            <a href="{{url(AdminUrl('permissions/create'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.add')}} {{trans('orbscope.permissions')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ ActiveLink(url('/admin/permissions')) }}">
                            <a href="{{url(AdminUrl('permissions'))}}" class="nav-link ">
                                <span class="title">{{trans('orbscope.show-all')}} {{trans('orbscope.permissions')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif


                 --->









        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->



<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
