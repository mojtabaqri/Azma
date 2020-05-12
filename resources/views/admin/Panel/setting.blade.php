<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        پروفایل شما
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
    />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Markazi Text font include just for persian demo purpose, don't include it in your project -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">

    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link href="../assets/css/material-dashboard-rtl.css?v=1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->

    <!-- Style Just for persian demo purpose, don't include it in your project -->
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4 {
            font-family: "Cairo";
        }
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }

    </style>
    <link href="../css/panel.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="../assets/img/sidebar-3.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="#" class="simple-text logo-normal">
                آزما | آزمون آنلاین
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{url()->to('admin/panel')}}">
                        <i class="material-icons">dashboard</i>
                        <p> داشبورد</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./regTest">
                        <i class="material-icons">event_note</i>
                        <p>  تعریف آزمون</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('resultTest')}}">
                        <i class="material-icons">report_problem</i>
                        <p>  مشاهده نتایج آزمون</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="./classManager">
                        <i class="material-icons">class</i>
                        <p>  مدیریت کلاس ها   </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="./studentManager">
                        <i class="material-icons">verified_user</i>
                        <p>  مدیریت دانشجویان   </p>
                    </a>
                </li>

                @if (Session::get('adminState')>3)
                    <li class="nav-item ">
                        <a class="nav-link" href="./masterManager">
                            <i class="material-icons">description</i>
                            <p>  مدیریت اساتید   </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item active  ">
                    <a class="nav-link" href="./examHolding">
                        <i class="material-icons">watch_later
                        </i>
                        <p>      برگزاری  آزمون   </p>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="{{url()->current()}}">داشبورد
                        <a>خوش آمدید {{Auth::getUser()->fname}} عزیز </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">account_balance_wallet
                                </i>
                                <p class="d-lg-none d-md-block">
                                    حساب کاربری
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{URL::to('/')}}">وبسایت اصلی </a>
                                <a class="dropdown-item" href="{{URL::to('/admin/setting')}}"> تنظیمات</a>
                                <a class="dropdown-item" href="{{URL::to('/admin/logout')}}">خروج</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->


<div class="content">
    <div class="row">
        <div class="col-md-12">

<div class="card p-3">
    <div class="card-title">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">اطلاعات شخصی</a>
            </li>
        </ul>
    </div>

    <div class="card-body " style="direction: rtl">
        <div class="container emp-profile">
            <form method="post">
                <div class="row">
       
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                {{$info['name']}}         {{$info['lastName']}}                   </h5>
                            <h6>
                                @if($info['level']>3)
                                    مدیریت کل سامانه ی آزما
                                    @else
                                    از اساتید برجسته سامانه ی آزما
                                    @endif

                            </h6>

                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>کد کاربری </label>
                                    </div>
                                    <div class="col-md-6">
                                        <p   id="sUserId" class="sInput">@if(!empty($master))
                                            {{$master['id']}}
                                            @else
                                                                             {{$info['id']}}
                                            @endif

                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>نام شما</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p contenteditable="true" id="sUserName" class="sInput">{{$info['name']}} </p>
                                    </div>
                                </div>
                                @if(Session::get('adminState')>3)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>نام خانوادگی شما</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p contenteditable="true" id="sUserLastName" class="sInput">{{$info['lastName']}} </p>
                                    </div>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>پست الکترونیک شما</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p contenteditable="true" id="sUserMail" class="sInput ">{{$info['email']}}</p>
                                    </div>
                                </div>
                                @if(Session::get('adminState')>3)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>تغیر  گذرواژه </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="password" id="sPass" class="sInput "></input>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>تکرار مجدد  گذرواژه </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="password" id="sRePass" class="sInput "></input>
                                        </div>
                                    </div>
                            @endif
                            @if((Session::get('adminState')<4) &&(!empty($master['TelePhone'])))
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>شماره تماس شما</label>
                                    </div>
                                    <div class="col-md-6 "style="direction: ltr">
                                        <p  contenteditable="true" id="sUserTell" class="sInput">{{$master['TelePhone']}} </p>
                                    </div>
                                </div>

                            @endif
                                <div class="row">
                                    @if(Session::get('adminState')<4)
                                    <div class="col-md-6">
                                        <label>کد ملی شما</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p contenteditable="true" class="sInput" id="sUserNationCode">{{$master['NationCode']}}</p>
                                    </div>
                                @endif

                                    <div class="col-md-2">
                                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="ویرایش  "/>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script>
        $(document).ready(function () {
            md.initDashboardPageCharts();
            //Profile Setting Controller
            $(".profile-edit-btn").click(function (e) {
                e.preventDefault();
                    @if(Session::get('adminState')>3){
                    var username=$("#sUserMail").text().trim();
                    var fname=$("#sUserName").text().trim();
                    var lname=$("#sUserLastName").text().trim();
                    var pass=$("#sPass").val().trim();
                    var rePass=$("#sRePass").val().trim();
                    if(username=="")
                    {
                        alert(' ابمیل  نمیتواند خالی باشد')
                        return false;
                    }
                    else if(fname=="")
                    {
                        alert(' نام  نمیتواند خالی باشد')
                        return false;

                    }
                else if(lname=="")
                    {
                        alert(' نام  خانوادگی خالی باشد')
                        return false;
                    }
                    if((pass!="")||(rePass!=""))
                    {

                        if(rePass!=pass)
                        {
                            alert('گذرواژه و تکرار آن یکسان نیست!');
                            return false;
                        }
                        else if(rePass=="")
                        {
                            alert('تکرار گذرواژه با گدرواژه مطابقت ندارد');
                            return false;
                        }
                    }
                    $.ajax({
                        type: 'post',
                        url: '{{route('UpdateProfileAjax')}}',
                        data: {
                            'id':$("#sUserId").text().trim(),
                            'isAdmin':'1',
                            'username' : username,
                            'password' : pass,
                            'fname' : fname,
                            'lname' :lname,
                            "_token": '{{ csrf_token() }}',
                        },
                        cache: false,
                        success: function(res){
                           if(res=="true")
                           {
                                $("#sUserMail").text(username);
                               $("#sUserName").text(fname);
                               $("#sUserLastName").text(lname);
                               alert('با موفقیت بروزرسانی شد!')
                           }

                        }
                    });
                }

                @else//master
                var username=$("#sUserMail").text().trim();
                var fname=$("#sUserName").text().trim();
                var phone=$("#sUserTell").text().trim();
                var nationCode=$("#sUserNationCode").text().trim();
                if(username=="")
                {
                    alert(' ابمیل  نمیتواند خالی باشد')
                    return false;
                }
                else if(fname=="")
                {
                    alert(' نام  نمیتواند خالی باشد')
                    return false;
                }
                else if(phone=="")
                {
                    alert(' تلفن تماس   نمیتواند خالی باشد')
                    return false;
                }
                else if(nationCode=="")
                {
                    alert(' کد ملی    نمیتواند خالی باشد');
                    return false;
                }
                $.ajax({
                    type: 'post',
                    url: '{{route('UpdateProfileAjax')}}',
                    data: {
                        'id':$("#sUserId").text().trim(),
                        'isAdmin':'0',
                        'masterAdmin':'{{$info['id']}}',
                        'username' : username,
                        'password' : nationCode,
                        'phone':phone,
                        'fname' : fname,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
if(res=="true")
{
    alert('بروزرسانی با موفقیت انجام شد!');
}
else{
    alert('مشکلی پیش آمده است')
}

                        console.log(res)

                    }
                });
                @endif


            });
            //End Profile Setting Controller
        });
    </script>
    <script src="../js/controller.js"></script>
</div>



</body>

</html>
