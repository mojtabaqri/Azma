
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>

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
    <link href="/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link href="/assets/css/material-dashboard-rtl.css?v=1.1" rel="stylesheet" />
    <link href="/assets/css/jquery.countdownTimer.css" rel="stylesheet" />
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
</head>

<body class="">

<div class="alert alert-danger text-center container-fluid  pb-2 mb-5 ">
    <p id="msg">    {{$msg}}
    </p>
    <p></p>
    <p style="color: #ffec00; text-shadow: 1px 1px 1px black">
    توجه : با قطع اتصال شما از سایت یا استفاده از دکمه Back باعث خاتمه و ثبت نهایی آزمون خواهد شد !
    </p>
    <div class=" text-left  " style="direction: ltr;width: 55% ; padding-top: 10px">
        <span style="direction: rtl">زمان باقی مانده :</span>
        <h2 class='timer' data-minutes-left={{(int)$hour}} ></h2>
        <section class='actions'> </section>

    </div>
</div>

    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Chartist JS -->
    <script src="/assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
<script src="/assets/js/plugins/jquery.countdownTimer.min.js" type="text/javascript"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->


    <div class="container pt-3 mt-3">

        <div class="row">

            <div class="col-lg-12">
<div class=" card-header">
    <h3 class="text-center"> آزمون <span> {{$test[0]->name}} </span></h3>

    <h4 class="text-center"> تعداد سوال  <span> {{$questions->count()}} </span></h4>
    <h5 class="text-right ">کد پیگیری :  {{ $trackingCode  }} </h5>
    <table class="table tab-pane">
                    <tbody>
                    <?php $c=1;?>
                    @unless(empty($questions))
                        @foreach($questions as $item)

                            <tr>
                                <td><div class="question border-bottom-1">

                                        <div ></span> سوال <?php echo $c++;?> ) <b> {{$item->caption}}
                                            </b><br>
                                            <br>
                                            <span>
                    <input  type="radio" name="{{$item->id}}" value="1">
                    </span>الف) {{$item->answer1}}  <br>
                                            <span>
                    <input  type="radio" name="{{$item->id}}"value="2">
                    </span>ب) {{$item->answer2}}  <br>
                                            <span >
                    <input  type="radio" name="{{$item->id}}" value="3">
                    </span>ج) {{$item->answer3}}  <br>
                                            <span>
                    <input  type="radio" name="{{$item->id}}" value="4">
                    </span>د) {{$item->answer4}}  <br>
                                        </div>

                                    </div></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @endunless


            </div>
        </div>
            </div>
        <div class="row">
            <div class="col-lg-2  " style="direction: ltr">

            </div>
            <div class="col-lg-10">
                <button class="btn btn-success" id="reg"> ثبت نهایی </button>
            </div>

        </div>




    </div>

    <script>
        $(document).ready(function () {

            //
         setTimeout(function () {
             $("#msg").slideUp('1000');
         },'6000');

            //
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

         function checkAnswer() {
             var dataElement=$(".question");
             var input=[];
              input= dataElement.find("input[type='radio']:checked");
              if(input.length<1){
                  alert('شما باید حد اقل یکی از سوال ها را پاسخ بدهید ! ');
              }
              else{
                  var data=[];
                  input.each(function (index , value) {
                     data.push(value['name']+"-"+value['value']);
                  });

                  $.ajax({
                      type: 'post',
                      url: '{{route('submitQuizAjax')}}',
                      data: {
                          'data':data,
                          'stdId':'{{$stId}}',
                          'testId':'{{$test[0]->id}}',
                          "_token": '{{ csrf_token() }}',
                      },
                      cache: false,
                      success: function(res){
                          console.log(res)
                          alert('آزمون با موفقیت ثبت شد   !');
                          window.location.replace('{{route('stPanel')}}');
                      }
                  });
              }
         }
         $("#reg").click(function (e) {
             e.preventDefault();
             checkAnswer();
         });


        });
    </script>

<script>
    $(function(){
        $('.timer').startTimer({
            onComplete: function(element){
                alert('آزمون پایان یافت به صفحه پنل هدایت میشوید!');
                window.location.replace('{{route('stPanel')}}');
            }
        });
    })
</script>

</body>
</html>
