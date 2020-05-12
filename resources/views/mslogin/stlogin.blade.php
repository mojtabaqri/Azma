
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود دانشجویان به  سامانه</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div class="container">

    <div class="container login-container">

        <div class="row">
            <div class="offset-3"></div>
            <div class="col-md-6 login-form-2">
                <h3> پنل دانشجو</h3>
                <form action="/stLogin" enctype="application/x-www-form-urlencoded" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input id="stLogin"  name="stLogin" type="text" class="form-control" placeholder=" نام کاربری  شما" value="" />
                        @if($errors->has('stLogin'))
                            <p style="color: white;font-family: Vazir;padding: 10px;">{{$errors->first('stLogin')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="stPass" name="stPass" type="password" class="form-control" placeholder="گذرواژه شما" value="">
                        @if($errors->has('stPass'))
                            <p style="color: white;font-family: Vazir;padding: 10px;">{{$errors->first('stPass')}}</p>
                        @endif
                    </div>
                    <div class="form-group text-center">
                        <input name="stLoginSubmit" id="stLoginSubmit" type="submit" class="btnSubmit " value="ورود" />
                    </div>

                </form>

                <div class="alert alert-danger" id="master-err-box">
                    <strong>خطا!</strong> <span id="master-err-txt"></span>
                </div>
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="offset-3"></div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/controller.js"></script>

</body>
</html>