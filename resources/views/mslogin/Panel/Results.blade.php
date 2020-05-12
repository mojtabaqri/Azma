@extends('layouts.Pstudent')
@section('title-of-page')
نتایج آزمون
@stop

@section("headTag")
    <link href='http://www.fontonline.ir/css/BTitrBold.css' rel='stylesheet' type='text/css'>
    <link href='http://www.fontonline.ir/css/BNazanin.css' rel='stylesheet' type='text/css'>
    <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>
    <style type="text/css">

        .main{
            width: 90%;
            height: auto;
            padding-bottom: 20px;
            padding: 20px;
            margin: auto;
            background: white;
            border: solid 1px #8c8686;
            border-radius: 20px;
            font-size: 18px;
            font-family:BNazanin,'BNazanin',tahoma;
        }
        .bnaznin{
            font-family:BNazanin,'BNazanin',tahoma;
            font-size: 15px;
font-weight: bold;
        }
        .main span{
            font-size: 13px;
            font-family: BTitrBold,'BTitrBold',tahoma;

        }
        .titr{
            font-family: BTitrBold,'BTitrBold',tahoma;
        }

        .FlexContainer{
            padding-right: 15px;
            display: inline-flex;
            font-size: 18pt;
            flex-direction: row;
            flex-wrap: nowrap;
            font-weight: bold;
        }
        section{
            padding: 10px 0px;
        }
        .first{
            flex-grow: 1;
            padding-left: 10pt;

        }
        .second{
            flex-grow: 1;
            text-align: right;
            padding-left: 16pt;


        }
        .third{
            flex-grow: 1;
            padding-left: 16pt;
        }
        .forth{
            flex-grow: 1;
            padding-left: 16pt;
        }
        .hr{
            border-top: solid 1px black;
            width: 100%;
            padding-left: 1px;
            padding-bottom: 15px;
        }
        .tbody{
            padding: 10px;
        }
        .tbody th{
            padding-left: 20px;
            font-family: BYekan,'BYekan',tahoma;
            font-size: 10pt;
        }
        .tbody td{
            font-size: 10pt;
            font-weight: bold;
        }
        .God{
            padding: 10px;
            font-weight: bold;
            text-align: center;
            font-family: BTitrBold,'BTitrBold',tahoma;

        }
        .God h4,h3,h5{
            margin: 0;
            padding: 0;
        }
        .heading{
            margin: auto;
        }
        @media only screen and (max-width: 720px) {
            .main{
                width: 70%;
            }
            .tbody th {
                padding-left: 2px;
            }
            .heading{
                font-size: 6pt;
            }
        }
        .print{
            text-align: center;
            padding: 20px;
        }



    </style>

@stop
@section('main-panel')

    <div class="row bg-light">
        <div class="col-md-6 border-dark">    <form class="form-horizontal bg-light p-3">
                <fieldset>

                    <!-- Form Name -->
                    <legend> جستجو بر اساس کد پیگیری  </legend>

                    <!-- Text input-->

                    <div class="form-group pt-5">
                        <span> کد پیگیری آزمون :</span>
                        <div class="col-md-5">
                            <input id="TrackingCode" name="TrackingCode" type="text" placeholder="مثال:12054" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->


                    <button class="btn btn-success btn-round" id="searchBtn">
                        <i class="material-icons">search</i>
                        جستجو
                    </button>

                </fieldset>

            </form>
        </div>
        <div class="col-md-6 pt-3">
            <fieldset>

                <!-- Form Name -->
                <legend> جستجو بر اساس نام آزمون </legend>

                <!-- Text input-->

                <div class="form-group pt-5">
                    <span> نام آزمون :</span>
                    <div class="col-md-5">
                        <input id="testName" name="testName" type="text" placeholder="مثال:مدار منطقی 1" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Text input-->


                <button class="btn btn-warning btn-round" id="advanceSearch" >
                    <i class="material-icons">search</i>
                    جستجو
                </button>

            </fieldset>

            </form>

        </div>
    </div>

    <div title="جستجو آزمون" id="searchResClassModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content ">
                <div class="card card-nav-tabs p-3">
                    <div class="card-header card-header-success">

                        <i class="material-icons"> dns </i> <span id="resultModeText"> لیست آزمون های جستجو شده  </span> </div>
                    <div class="card-body">
                        <ul id="appendClass">
                            <li class="list-unstyled  mr-2 border border-top-0 border-left-0 border-right-0 ">
                                <a href="#" class="pr-5" style="color: rgba(1,1,1,0.8);"> نام آزمون </a>
                                <a class="abs">  مشاهده کارنامه</a>
                            </li>
                            <li class="pb-3 list-unstyled" ></li>
                            <div class="tests">

                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dataGrid" id="printArea">
</div>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var testName;
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            };
            $(document).on('click','#printBtn',function () {
               var a= $(".dataGrid").html();
               $("#printBtn").hide();
                printDiv('printArea');

            });

            var regExpMasterCode = /^\d*$/;
              $("#searchBtn").click(function (e) {
                  $("#printArea").html("");
                  e.preventDefault();
                  var trackingCode=$("#TrackingCode").val().trim();
                  if(trackingCode=="")
                  {
                      alert('کد پیگیری را باید وارد کنید! ');
                      return false;
                  }
                  else if(regExpMasterCode.test(trackingCode)==false)
                  {
                      alert('کد پیگیری شامل اعداد صحیح میباشد ');
                      return false;
                  }
                  $.ajax({
                      type: 'POST',
                      url: '{{route('quizResultPost')}}',
                      data: {
                          "trackingCode":trackingCode,
                          "_token": '{{ csrf_token() }}',
                      },
                      cache: false,
                      success: function(res){
                          console.log(res);
                          $(".dataGrid").html("");
                          $(".dataGrid").append(res);
                      }
                  })
              });
        });

        //advance Search
        $("#advanceSearch").click(function () {
            $(".tests").html("");
            testName=$("#testName").val().trim();
            if(testName=="")
            {
                alert('لطفا نام آزمون را وارد کنید');
                return false;
            }
            $.ajax({
                type: 'POST',
                url: '{{route('getQuizTrackCode')}}',
                data: {
                    "name":testName,
                    "_token": '{{ csrf_token() }}',
                },
                cache: false,
                success: function(res){
                    $(".tests").html(res);
                    $('#searchResClassModal').modal(true);

                }
            })

        });
        //Selectors Functions************************************************

        $(document).on('click','.selectTest',function () {
            tCode=$(this).attr("title");
            $.ajax({
                type: 'POST',
                url: '{{route('quizResultPost')}}',
                data: {
                    "trackingCode":tCode,
                    "_token": '{{ csrf_token() }}',
                },
                cache: false,
                success: function(res){
                    $(".dataGrid").html("");
                    $(".dataGrid").append(res);

                }
            })
        });
        //Selectors Functions************************************************

        //Advance Search

    </script>
@stop

