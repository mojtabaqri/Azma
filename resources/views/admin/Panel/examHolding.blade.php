@extends('layouts.Pmaster')
@section('title-of-page')
    برگزاری آزمون ها
    @stop

@section('main-panel')

 <div class="container">
<div class="boxholder p-3">
 {{--Quiz Manager Panel--}}
 <div class="searchBox row">

  <div class="col-md-12  p-3">

      <form class="form-horizontal bg-light p-3">
          <fieldset>

              <!-- Form Name -->
              <legend> برگزاری آزمون</legend>

              <!-- Text input-->

              <div class="form-group pt-5">
                  <span> کد کلاس</span>
                  <div class="col-md-5">
                      <input id="classId" name="classId" type="text" placeholder="مثال:12054" class="form-control input-md" required="">
                      <span class="classId-help text-danger"> </span>
                  </div>
              </div>

              <!-- Text input-->

              <div class="form-group">
                  <span> کد آزمون</span>

                  <div class="col-md-5">
                      <input id="testId" name="testId" type="text" placeholder="مثلا :120" class="form-control input-md" required="">
                      <span class="testId-help text-danger"> </span>
                  </div>
              </div>

              <button class="btn btn-success btn-round" id="holdExamBtn">
                  <i class="material-icons">assignment</i>
                  برگزاری آزمون
              </button>

              <button class="btn btn-warning btn-round" id="searchExam" data-toggle="modal" data-target="#searchModal">
                  <i class="material-icons">search</i>
                  جستجو آزمون
              </button>
          </fieldset>
      </form>



      <div class="modal fade" id="searchModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-signup" role="document">
              <div class="modal-content ">
                  <div class="card card-signup card-plain">
                      <h5 class="modal-title text-center border border-top-0 p-2  ">جستجو </h5>
                      <div class="row ">

                              <div class="col-md-12 searchBoxHolder" >

                                  <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#home"> <i class="material-icons">
                                                  search
                                              </i>جستجو کلاس </a></li>
                                      <li><a data-toggle="tab" href="#menu3">   جستجو آزمون</a></li>
                                  </ul>

                                  <div class="tab-content">
                                      <div id="home" class="tab-pane fade in active">

                                          <div class="row">
                                              <div class="col-md-12">
                                                  <form>
                                                      <div class="col p-2">
                                                          <p>جستجو بر اساس نام کلاس :</p>

                                                          <input id="classNameInput" type="text" class="form-control" placeholder="نام کلاس">
                                                      </div>

                                                      <button class="btn btn-secondary btn-round" id="searchClassNameBtn"  >
                                                          <i class="material-icons">search</i>
                                                          جستجو ...
                                                      </button>

                                                  </form>
                                              </div>
                                          </div>


                                      </div>

                                      <div id="menu3" class="tab-pane fade">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <form>
                                                      <div class="col p-2">
                                                          <p>جستجو بر اساس نام آزمون :</p>

                                                          <input id="searchTestNameInput" type="text" class="form-control" placeholder="نام آزمون">
                                                      </div>

                                                      <button class="btn btn-secondary btn-round" id="searchTestNameBtn"  >
                                                          <i class="material-icons">search</i>
                                                          جستجو ...
                                                      </button>

                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                              </div>
                      </div>


                  </div>
              </div>
          </div>
      </div>
      <div title="جستجو آزمون " id="searchResModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
              <div class="modal-content ">
                  <div class="card card-nav-tabs p-3">
                      <div class="card-header card-header-danger">

                          <i class="material-icons"> dns </i> <span id="resultModeText"> لیست آزمون های جستجو شده  </span> </div>
                      <div class="card-body">
                          <ul>
                              <li class="list-unstyled  mr-2 border border-top-0 border-left-0 border-right-0 ">
                                  <a href="#" class="pr-5" style="color: rgba(1,1,1,0.8);"> نام آزمون </a>
                                  <a class="abs"> انتخاب کنید</a>
                              </li>
                              <li class="pb-3 list-unstyled"></li>
                          <div class="classes">

                          </div>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div title="جستجو کلاس" id="searchResClassModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
              <div class="modal-content ">
                  <div class="card card-nav-tabs p-3">
                      <div class="card-header card-header-success">

                          <i class="material-icons"> dns </i> <span id="resultModeText"> لیست کلاس های جستجو شده  </span> </div>
                      <div class="card-body">
                          <ul id="appendClass">
                              <li class="list-unstyled  mr-2 border border-top-0 border-left-0 border-right-0 ">
                                  <a href="#" class="pr-5" style="color: rgba(1,1,1,0.8);"> نام کلاس </a>
                                  <a class="abs"> انتخاب کنید</a>
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

  </div>
 </div>
 {{--Quiz Manager Panel--}}









</div>

 </div>
@stop

@section('scripts')
<script type="text/javascript">
 $(document).ready(function () {
var iClassName,iTestName;
var testCode,classCode;
 var flag=0; //if flag  = 1 ? : Search Test Name // else if flag = 2 ? : Search Class Name
     $("#searchExam").click(function (e) {
        e.preventDefault();
     });

     //Search Test Name Function
     $("#searchTestNameBtn").click(function (e) {
        e.preventDefault();
        flag=2;
        iTestName=$("#searchTestNameInput").val().trim();
         if(iTestName!=""){
             $.ajax({
                 type: 'POST',
                 url: '{{route('examSearchAjax')}}',
                 data: {
                     "flag":flag,
                     "testName":iTestName,
                     "_token": '{{ csrf_token() }}',
                 },
                 cache: false,
                 success: function(res){
                     if(res=="010")
                     {
                         alert('یافت نشد !');
                         return false;
                     }
                     else {
                         $(".classes").html(res);
                         $('#searchResModal').modal(true);
                     }



                 }
             });
         }
         else {
             alert('نام آزمون را باید وارد کنید !');
             return false;
         }

     });
     //Search Test Name Function

     //Search class Name Function

     $("#searchClassNameBtn").click(function (e) {
        e.preventDefault();
        flag=1;
        iClassName=$("#classNameInput").val().trim();
        if(iClassName!=""){
            $.ajax({
                type: 'POST',
                url: '{{route('examSearchAjax')}}',
                data: {
                    "flag":flag,
                    "className":iClassName,
                    "_token": '{{ csrf_token() }}',
                },
                cache: false,
                success: function(res){
                    if(res=="010")
                    {
                        alert('یافت نشد !');
                        return false;
                    }
                    else{
                        $(".tests").html(res);
                        $('#searchResClassModal').modal(true);

                    }
                }
            });
        }
        else {
            alert('نام کلاس را باید وارد کنید !');
            return false;
        }
   });
     //Search class Name Function


     $("#holdExamBtn").click(function (event) {
         var regExpMasterCode = /^\d*$/;
         event.preventDefault();
         var a,b;
         a= $("#classId").val().trim();
         b= $("#testId").val().trim();
         $(".testId-help").text("");
         $(".classId-help").text("");
         if(a==""){
             $(".classId-help").text(" کد کلاس را وارد کنید");
             return false;
         }
         else if(regExpMasterCode.test(a)==false){
             $(".classId-help").text(" کد کلاس را باید از نوع عدد باشد ");
             return false;
         }
         if(b==""){
             $(".testId-help").text(" کد آزمون را وارد کنید");
             return false;
         }
         else if(regExpMasterCode.test(b)==false){
             $(".testId-help").text(" کلاس آزمون باید عدد باشد    ");
             return false;
         }

         $.ajax({
             type: 'POST',
             url: '{{url()->current()}}',
             data: {
                 "classId":a,
                 "examId":b,
                 "_token": '{{ csrf_token() }}',
             },
             cache: false,
             success: function(res){
                 console.log(res);
                  switch (res) {
                      case "0":
                          alert('آزمون برگزار شد! پس ا پایان زمان آزمون ورود دانشجویان بسته خواهد شد!');
                          break;
                      case "1":
                          alert('کلاس مورد نظر یافت نشد');
                          break;
                      case "2":
                          alert('آزمون مورد نظر یافت نشد ! ');
                          break;
                      case "3":
                          alert('کلاس هنوز تشکیل نشده است ');
                          break;
                  }
             }
         })
         //Ajax End


     });

     //Selectors Functions************************************************

       $(document).on('click','.selectClass',function () {
       classCode=$(this).attr("title");
       $("input#classId").val(classCode);
       alert('باموفقیت  انتخاب شد!');
       });
       $(document).on('click','.selectTest',function () {
       testCode=$(this).attr("title");
       $("input#testId").val(testCode);
           alert('باموفقیت  انتخاب شد!');

       });
     //Selectors Functions************************************************


 });


</script>
@stop

