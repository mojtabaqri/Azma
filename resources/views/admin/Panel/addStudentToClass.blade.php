@extends('layouts.Pmaster')
@section('title-of-page')
ویرایش دانش آموزان کلاس
    {{$className}}
    @stop

@section('main-panel')

 <div class="container">
<div class="boxholder p-3">
 {{--Quiz Manager Panel--}}
 <div class="searchBox row">
     <h5>ویرایش دانش آموزان کلاس
         {{$className}}</h5>
  <div class="col-md-12  p-3">
   <button class="btn btn-success btn-round" data-toggle="modal" data-target="#registerQuiz">
    <i class="material-icons">assignment</i>
    اضافه کردن دانشجو با کد دانشجویی
   </button>
      <button class="btn btn-warning btn-round" data-toggle="modal" data-target="#searchModal">
          <i class="material-icons">assignment</i>
          اضافه کردن پیشرفته
      </button>
  </div>
 </div>
 {{--Quiz Manager Panel--}}

 {{--Error Handler--}}
 <div class="row handler ntStudent">
  <div class="offset-md-2"></div>
  <div class="col-md-8 text-center  ">
   @if(count($unit)>0)
    <div class="alert alert-success alert-dismissible fade show pb-4 " role="alert">
     <span class="fa fa-check-square float-right  pr-2" style="font-size: 30px"></span>
      <strong>تعداد {{count($unit)}} دانشجوبرای این کلاس یافت شد</strong> میتوانید  برای ویرایش آنها  اقدام کنید
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
   @else
    <div class="alert alert-danger alert-dismissible fade show pb-4 " role="alert">
     <span class="fa fa-exclamation-triangle float-right  pr-2" style="font-size: 30px"></span>
     <strong>  دانشجویی برای این کلاس یافت نشد ! </strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
   @endif
  </div>
  <div class="offset-md-2"></div>
</div>
 {{--Error Handler--}}

 {{--DataTable--}}
 <div class="row">
  <div class="col-md 12">
   <table class="table remPd">
    <thead>
    <tr>
     <th> کد دانشجو</th>
     <th> نام کاربری دانشجو</th>
     <th>  نام دانشجو</th>
     <th>  وضعیت دانشجو </th>
     <th> مدیریت </th>
    </tr>
    </thead>
    <tbody class="dataGrid">
    <?php echo $row ?>
    </tbody>
   </table>
  </div>
 </div>



 {{--Register Quiz Modal--}}
 <div class="modal fade" id="registerQuiz" tabindex="-1" role="dialog">
  <div class="modal-dialog " role="document">
   <div class="modal-content">
    <div class="row p-2 ">
     <div class="col-md-12">
      <div class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-header card-header-text card-header-primary">
          <div class="card-text">
           <h4 class="card-title"> ثبت دانشجو  </h4>
          </div>
         </div>
         <div class="card-body">
          <form  method="post" id="registerQuizForm" >
              <div class="input-group">
                  <div class="input-group-prepend">
      <span class="input-group-text">
          <i class="material-icons">group</i>
      </span>
                  </div>
                  <input id="studentCode" name="studentCode"  type="text" class="form-control" placeholder="کد کاربری دانشجویی">
              </div>
              <button  id="regQuiz" type="submit" class="btn btn-success mr-6 float-left " > ثبت </button>
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
 {{--Register Quiz Modal--}}




 {{--delete quiz modal --}}
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog " role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title"> حذف دانشجو از کلاس  <span id="testName"></span> </h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">
     <p>آیا تمایل به حذف این دانشجو دارید ؟</p>
    </div>
    <div class="modal-footer ">
     <button type="button" class="btn btn-danger" id="deleteBtn" >بله </button>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
    </div>
   </div>
  </div>
 </div>

 {{--delete quiz modal --}}


 {{--DataTable--}}


    {{--Advande Student Add--}}
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content ">
                <div class="card card-signup card-plain">
                    <h5 class="modal-title text-center border border-top-0 p-2  ">جستجو </h5>
                    <div class="row ">

                        <div class="col-md-12 searchBoxHolder" >


                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <div class="col p-2">
                                                    <p>جستجو بر اساس نام دانشجو :</p>

                                                    <input id="advStudentName" type="text" class="form-control" placeholder="نام دانشجو">
                                                </div>

                                                <button class="btn btn-secondary btn-round" id="advSearchBtn"  >
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

    <div title="اضافه کردن پیشرفته  " id="advanceAdd" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content ">
                <div class="card card-nav-tabs p-3">
                    <div class="card-header card-header-danger">

                        <i class="material-icons"> dns </i> <span id="resultModeText"> لیست دانشجویان های جستجو شده  </span> </div>
                    <div class="card-body">
                        <ul>
                            <li class="list-unstyled  mr-3 border border-top-0 border-left-0 border-right-0 ">
                                <a href="#" class="pr-5" style="color: rgba(1,1,1,0.8);"> نام دانشجو </a>
                                <a class="abs"> انتخاب کنید</a>
                            </li>
                            <li class="pb-3 list-unstyled"></li>
                            <div class="tests">

                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Advande Student Add--}}
</div>

 </div>
@stop

@section('scripts')
<script type="text/javascript">
 $(document).ready(function () {
 // current id = cid
 // current row = crow
var cid;
var crow;
     var regExpMasterCode = /^\d*$/;
    var advStudentName;

     //register Quiz
     $("#regQuiz").click(function (event) {
         event.preventDefault();
         var a;
         a=$("#studentCode").val().trim();
         if(a=="")
         {
             alert(' کد دانشجویی نمیتواند خالی باشد!');
             return false;
         }
         else if(regExpMasterCode.test(a)==false)
         {
             alert('کد دانشجو فقط میتواند یک عدد صحیح 14 رقمی باشد');
             return false;
         }
         $.ajax({
             type: 'POST',
             url: './unitManage',
             data: {
                 "studentCode":a,
                 "classId":'{{$id}}',
                 "_token": '{{ csrf_token() }}',
             },
             cache: false,
             success: function(res){
                 if(res=="1")
                 {
                     alert('انجام نشد . خطای پایگاه داده ');
                  return false;
                 }
                 else  if(res=="2")
                 {
                     alert('انجام نشد . این دانشجو قبلا به این کلاس اضافه شده است!  ');
                     return false;

                 }
                 else if(res=="3")
                 {
                     alert('انجام نشد . دانشجو یافت نشد ');
                     return false;
                 }
                 else {
                     $(".dataGrid").append(res);
                     $('#registerQuiz').modal('hide');
                     $(".datagridbox").slideDown(1000);
                 }
             }
         })
         //Ajax End
     });

     //register Quiz


     //Delete Actions
     $(document).on('click','.deleteBtn',function () {
         crow=$(this).parent().parent();
         cid=crow.children('td').html().trim();

     });

     $("#deleteBtn").click(function () {
         $.ajax({
             type: 'DELETE',
             url: './unitManage/'+cid,
             data: {
                 'id':cid,
                 "_token": '{{ csrf_token() }}',
             },
             cache: false,
             success: function(res){
                 if(res=="true") crow.slideUp("slow");
                 else alert('انجام نشد');
             }
         });
       $('#deleteModal').modal('hide');
       //Ajax End
   });
     //Delete Actions


     //Advance Add


     $("#advSearchBtn").click(function (e) {
         e.preventDefault();
         advStudentName=$("#advStudentName").val().trim();
         if(advStudentName!="") {
             $.ajax({
                 type: 'POST',
                 url: '{{route('advSearchAjax')}}',
                 data: {
                     "name":advStudentName,
                     "_token": '{{ csrf_token() }}',
                 },
                 cache: false,
                 success: function(res){
                     console.log(res);
                     if(res=="010")
                     {
                         alert('یافت نشد !');
                         return false;
                     }
                     else{
                         $(".tests").html(res);
                         $('#advanceAdd').modal(true);
                     }
                 }
             });


         }
         else {
             alert('نام دانشجو را باید وارد کنید !');
         }

     });
//Tick
  $(document).on('click','.select',function () {
      var userName;
     userName=$(this).attr('title');
      $.ajax({
          type: 'POST',
          url: './unitManage',
          data: {
              "studentCode":userName,
              "classId":'{{$id}}',
              "_token": '{{ csrf_token() }}',
          },
          cache: false,
          success: function(res){
              if(res=="1")
              {
                  alert('انجام نشد . خطای پایگاه داده ');
                  return false;
              }
              else  if(res=="2")
              {
                  alert('انجام نشد . این دانشجو قبلا به این کلاس اضافه شده است!  ');
                  return false;

              }
              else if(res=="3")
              {
                  alert('انجام نشد . دانشجو یافت نشد ');
                  return false;
              }
              else {
                  $(".dataGrid").append(res);
                  $('#registerQuiz').modal('hide');
                  $(".datagridbox").slideDown(1000);
                  $(".ntStudent").hide();
              }
          }
      })

  });
//Tick


     //Advance Add




 });


</script>
@stop

