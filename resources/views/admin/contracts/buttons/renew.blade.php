@if($status =='progress')
<a href="{{ url(AdminPath().'/renew/'.$id)}}" class="btn btn-success">{{trans('front.renew')}}</a>
@endif