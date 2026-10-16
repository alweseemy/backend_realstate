<!DOCTYPE html>
<html lang="{{GetLanguage()}}" dir="{{GetDirection()}}">

<head>

    <meta charset="utf-8">
    <meta name="keywords" content="{{ VarByLang(GetSettings()->keywords, GetLanguage()) }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('uploads/'.GetSettings()->icon)}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="alweseemy">
    <meta name="description" content="{{ VarByLang(GetSettings()->footer_desc, GetLanguage()) }}">
    <title>{{ empty($title)?  GetSettings()->name : GetSettings()->name .' | '.$title }}</title>


    @if (GetLanguage() == "ar")

        <script src="{{url('orbscope/service')}}/../../cdn-cgi/apps/head/Oy59uNyS-HS5eBg_KJoiEjW-Xo8.js"></script><link rel="stylesheet" href="{{url('orbscope/service')}}/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{url('orbscope/service')}}/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{url('orbscope/service')}}/css/pe-icon-7-stroke.css">

        <link rel="stylesheet" href="{{url('orbscope/service')}}/css/style-rtl.css">
    @else

    <script src="{{url('orbscope/service')}}/../../cdn-cgi/apps/head/Oy59uNyS-HS5eBg_KJoiEjW-Xo8.js"></script><link rel="stylesheet" href="{{url('orbscope/service')}}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{url('orbscope/service')}}/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{url('orbscope/service')}}/css/pe-icon-7-stroke.css">

    <link rel="stylesheet" href="{{url('orbscope/service')}}/css/style.css">

     @endif
</head>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{url('/')}}">
                    <img style="height: 120px;" src="{{ShowImage($show->logo)}}">
                   </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            @if(GetLanguage() == "ar")
                            <li><a href="{{url('lang/en')}}" class="btn btn-info">English</a></li>
                            @else
                                <li><a href="{{url('lang/ar')}}" class="btn btn-info">عربي</a></li>

                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<body>






@yield('content')








<footer>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="foot-box">
                    <h6 class="column-title">{{trans('front.contact')}}</h6>
                    <ul>
                        <li><a href="#">{{GetSettings()->phone}}</a></li>
                        <li><a href="#">{{GetSettings()->email}}</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="subscribe">
                    <h6 class="column-title">{{GetSettings()->name}}</h6>
                    <div class="social-icons">
                        <a href="{{GetSettings()->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="{{GetSettings()->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="{{GetSettings()->googleplus}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright" style="text-align: center;">
                    <a style="color: white;" href="#"> All rights reserved to {{GetSettings()->name}}</a>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{url('orbscope/service')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{url('orbscope/service')}}/js/popper.min.js"></script>
<script src="{{url('orbscope/service')}}/js/bootstrap.min.js"></script>
<script src="{{url('orbscope/service')}}/js/script.js"></script>
@yield('js')
</body>

</html>