
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title-of-page')
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
            <div class="container-fluid">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> <i class="material-icons text-light">error</i> توجه!</strong> منظور از کد دانشجو  یا استاد همان کد ثبت نام  میباشد که توسط سیستم تولید میشود!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @yield('main-panel')

            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright  text-center">

                        <script>
                            document.write(new Date().getFullYear())
                        </script>, ساخته شده با
                        <i class="material-icons">favorite</i> توسط
                        <a href="mailto://mojtabaqri@gmail.com" target="_blank">محمد مهدی کریمی </a>
                    </div>
                </div>
            </footer>
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
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
    <script src="../js/controller.js"></script>
</div>


        @yield('scripts')
</body>

</html>
