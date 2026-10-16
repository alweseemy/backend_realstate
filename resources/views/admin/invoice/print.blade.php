@extends(AdminCore())
@section('css')
    <link href="{{url('orbscope/admin')}}/assets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')



    <div class="invoice">
        <div class="row">
            <div class="col-xs-12">
            <div class="col-xs-4">
                <h3>اكسبرس للعقارات</h3>
                <h4><i class="fa fa-phone"></i>:+97167442616</h4>
                <h4><i class="fa fa-fax"></i>:2322</h4>
                <h5>عجمان - ا.ع.م</h5>

            </div>
            <div class="col-xs-4 ">
               <img style="height: 160px;margin-right: 20px;" src="{{ShowImage(GetSettings()->logo)}}">

                <h4> ere.ajman@gmail.com <i class="fa fa-envelope"></i></h4>

            </div>
            <div class="col-xs-4">
                <h3>EXPRESS realstate</h3>
                <h4><i class="fa fa-phone"></i>:+97167442616</h4>
                <h4><i class="fa fa-fax"></i>:2322</h4>
                <h5>Ajman-U.A.E</h5>

            </div>
            <div class="col-xs-12">
                    <div class="col-xs-4">
                       <h4>{{trans('orbscope.date')}} : {{$show->date}}</h4>


                    </div>
                    <div class="col-xs-8 ">
                        <h3>{{@$show->invoicetype->name}}</h3>
                    </div>

            </div>
        </div>
        <hr/>
            <br/>
            <br/>
        <div class="row" style="margin-top: 220px;">
            <div class="col-xs-1">

            </div>
          @if($show->flat_id != null && @$show->type ==1 )
            <div class="col-xs-5">
                <h3>   {{trans('orbscope.user')}}   {{$show->contract->user->name}}</h3>
                <ul class="list-unstyled">

                    <li> <span>{{trans('orbscope.phone')}} : </span> {{@$show->contract->user->phone}} </li>
                    <li>  {{@$show->contract->user->email}} </li>

                </ul>
            </div>
          @endif
            <div class="col-xs-5">
                <h3> {{trans('orbscope.owner')}}  {{@$show->unit->owner->name}}</h3>
                <ul class="list-unstyled">
                    <li>
                    <li> <span>{{trans('orbscope.phone')}} : </span> {{@$show->unit->owner->phone}} </li>
                    <li>  {{@$show->unit->owner->email}} </li>

                </ul>
            </div>
            <div class="col-xs-1">

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="margin: 20px;">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th> {{trans('orbscope.apartment')}} </th>
                        <th >{{trans('orbscope.unit')}}</th>
                        <th>{{trans('orbscope.amount_money')}}</th>
                        <th>{{trans('orbscope.details')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> {{@$show->flat->unit_number}} </td>
                            <td> {{@$show->unit->name}} </td>
                            <td> {{$show->amount}} </td>
                            <td> {{$show->details}} </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-8 invoice-block" style="margin: 20px;">
                <ul class="list-unstyled amounts">

                    <li>
                        <strong>{{trans('orbscope.total')}} : {{$show->amount}} {{trans('orbscope.aed')}}</strong>

                    </li>





                </ul>
                <br/>
                <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                    <i class="fa fa-print"></i>
                </a>

            </div>

        </div>
    </div>




@endsection
