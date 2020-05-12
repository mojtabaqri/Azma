
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود مدیریت سامانه</title>
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
                <h3> پنل مدیریت</h3>
                <form action="/admin" enctype="application/x-www-form-urlencoded" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input id="adminLogin"  name="adminLogin" type="text" class="form-control" placeholder=" ایمیل  شما" value="" />
                        @if($errors->has('adminLogin'))
                            <p style="color: white;font-family: Vazir;padding: 10px;">{{$errors->first('adminLogin')}}</p>
                            @endif
                    </div>
                    <div class="form-group">
                        <input id="adminPass" name="adminPass" type="password" class="form-control" placeholder="گذرواژه شما" value="">
                        @if($errors->has('adminPass'))
                           <p style="color: white;font-family: Vazir;padding: 10px;">{{$errors->first('adminPass')}}</p>
                        @endif

                    </div>
                    <div class="form-group text-center">
                        <input name="adminSubmit" id="adminSubmit" type="submit" class="btnSubmit " value="ورود" />
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