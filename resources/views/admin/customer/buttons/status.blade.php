@if($type=='teacher')
@if($status=='inactive')
<a href="{{ url(AdminPath().'/user/'.$id.'/active')}}" class="btn blue">{{trans('front.inactive')}}</a>
@else
<a href="{{ url(AdminPath().'/user/'.$id.'/inactive')}}" class="btn btn-danger">{{trans('front.active')}}</a>
@endif
@else
    @if($payment=='paid')
    <span class="label label-sm label-warning"> {{trans('orbscope.paid')}} </span>
    @else
        <span class="label label-sm label-success"> {{trans('orbscope.free')}} </span>
    @endif
@endif