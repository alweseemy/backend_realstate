@if (count($errors) > 0)
    <div class="alert alert-danger" dir="{{GetDirection()}}">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





@if(session()->has('success'))
    <div class="alert alert-success">
        <ul>
        {{trans('front.contactMessage')}}
        </ul>
    </div>
@endif







