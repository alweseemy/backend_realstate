<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Site Metas -->
<title>@if(!empty($title)) {{$title}} || {{ @SettingsByLang('name',GetLanguage()) }}  @else {{ @SettingsByLang('name',GetLanguage()) }}  @endif</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->




<link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap/css/bootstrap{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>








<!-- Site CSS -->
<link href="{{url('orbscope/admin')}}/assets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
<!-- ALL VERSION CSS -->

<!-- Responsive CSS -->

<!-- Custom CSS -->


<style>
    #tests{
        background-repeat: none repeat;
    }
    .align-items-center {
        margin-bottom: 0px;
    }

    #try{
        background-color: #333333;
        border: 10px;
        padding-left: 50px;
        border-radius: 0px 200px 0px 0px;
    }
    @media print {
        .noprint { display: none; }
    }
    @font-face {
        font-family: 'NotoSansCJKhk';
        font-style: normal;
        font-weight: bold;
        src: url({{ storage_path('fonts/alfont_com_arial-1.ttf') }}) format('truetype')
    }
    html {
        font-family: 'NotoSansCJKhk' !important;
    }
    body { font-family: DejaVu Sans, serif !important; }
    *, h1, h2, h3, h4, h5, h6, body {
        font-family: DejaVu Sans, serif !important;
    }
    p{

        font-family: DejaVu Sans, serif;
    }
</style>

<body class="host_version" lang="en">






<!-- End header -->






<div class="invoice" >
    <div class="row invoice-logo">
        <div class="col-xs-6 invoice-logo-space">
            <p>{{GetSettings()->name}}</p>
        </div>
        <div class="col-xs-6">
            <p>فاتورة سداد ايجار وحدة</p>
        </div>
    </div>
    <hr/>
    <div class="row">

        <div class="col-xs-6" style="text-align: right;">

            <p style="margin-right: 0px;"> المستاجر {{@$show->contract->user->name}}  </p>
            <ul class="list-unstyled" style="text-align: right;">

                <li>  الهاتف  {{@$show->contract->user->phone}}: </li>
                <li>   {{@$show->contract->user->email}} </li>

            </ul>
        </div>
        <div class="col-xs-6" style="text-align: right;">
            <p> صاحب العقار {{@$show->contract->owner->name}}  </p>
            <ul class="list-unstyled">

                <li>  الهاتف  {{@$show->contract->owner->phone}}: </li>
                <li>  {{@$show->contract->owner->email}} </li>
            </ul>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th> الوحدة </th>
                    <th> رقم الوحدة </th>
                    <th >العقار</th>
                    <th>المبلغ</th>
                    <th>التاريخ</th>
                </tr>
                </thead>
                <tbody>

                <tr style="text-align: right;">
                    <td > {{@$show->flat->name}} </td>
                    <td> {{@$show->flat->unit_number}} </td>
                    <td> {{@$show->unit->name}} </td>
                    <td> {{$show->amount}} </td>
                    <td> {{$show->date}} </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-8 invoice-block">
            <ul class="list-unstyled amounts">

                <li>
                    <strong>الاجمالي : {{$show->amount}} ريال</strong>

                </li>

            </ul>
            <br/>


        </div>

    </div>
</div>



<!--   <strong style="color:black;"> | </strong> -->




<!-- Footer -->





</body>


</html>



