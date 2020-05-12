@extends('layouts.Pmaster')
@section('title-of-page')
 ویرایش آزمون کد {{$id}} | @unless(empty($testName)) {{$testName}}  @endunless
    @stop

@section('main-panel')

 <div class="container">
<div class="boxholder p-3">
 {{--Quiz Manager Panel--}}
 <div class="searchBox row">
  <div class="col-md-12  p-3">
   <button class="btn btn-success btn-round" data-toggle="modal" data-target="#registerQuiz">
    <i class="material-icons">assignment</i>
    اضافه کردن سوال
   </button>
  </div>
 </div>
 {{--Quiz Manager Panel--}}


 {{--Error Handler--}}
 <div class="row handler">
  <div class="offset-md-2"></div>
  <div class="col-md-8 text-center  ">
   @if(count($test)>0)
    <div class="alert alert-success alert-dismissible fade show pb-4 " role="alert">
     <span class="fa fa-check-square float-right  pr-2" style="font-size: 30px"></span>
      <strong>تعداد {{count($test)}} سوال یافت شد</strong> برای ویرایش آنها هم اکنون اقدام کنید
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
   @else
    <div class="alert alert-danger alert-dismissible fade show pb-4 " role="alert">
     <span class="fa fa-exclamation-triangle float-right  pr-2" style="font-size: 30px"></span>
     <strong>  سوالی برای این آزمون یافت نشد ! </strong>
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
     <th> کد سوال</th>
     <th> متن سوال</th>
     <th> پاسخ 1</th>
     <th>پاسخ 2</th>
     <th>پاسخ 3</th>
     <th>پاسخ 4</th>
     <th>پاسخ صحیح </th>
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
           <h4 class="card-title"> ثبت سوال  </h4>
          </div>
         </div>
         <div class="card-body">
          <form  method="post" id="registerQuizForm" >
           {{csrf_field()}}
           <div class="form-group">
            <input  type="text" class="form-control" id="qCaption" name="qCaption" placeholder=" متن سوال :">
           </div>
           <div class="form-group">
            <input type="text" class="form-control" id="qAnswer1" name="qAnswer1" placeholder="  پاسخ اول  ">
           </div>
           <div class="form-group">
            <input type="text" class="form-control" id="qAnswer2" name="qAnswer2" placeholder="پاسخ دوم ">
           </div>
           <div class="form-group">
            <input type="text" class="form-control" id="qAnswer3" name="qAnswer3" placeholder="پاسخ سوم ">
           </div>
           <div class="form-group">
            <input type="text" class="form-control" id="qAnswer4" name="qAnswer4" placeholder="پاسخ چهارم ">
           </div>
           <div class="form-group">
            <input min="1" max="4" type="number" class="form-control" id="qCorrectAnswer" name="qCorrectAnswer" placeholder="پاسخ صحیح : 3و2و1و4 ">
           </div>
           <button  id="regQuiz" type="submit" class="btn btn-success mr-6 " > ثبت </button>
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


 {{--edit quiz modal--}}
 <div class="modal fade" id="editQuiz" tabindex="-1" role="dialog">
  <div class="modal-dialog eModal  " role="document">
   <div class="modal-content">
    <div class="row p-2 ">
     <div class="col-md-12">
      <div class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-header card-header-text card-header-danger">
          <div class="card-text">
           <h4 class="card-title"> ویرایش سوال   </h4>
          </div>
         </div>
         <div class="card-body">
             <form  method="post" id="editQuizForm"  >
                 {{csrf_field()}}
                 <div class="form-group" >
                     <label for="eCaption" > سوال</label>
                     <input  type="text" class="form-control" id="eCaption" name="eCaption" placeholder=" متن سوال :">
                 </div>
                 <div class="form-group">
                     <label for="eAnswer1"> پاسخ اول</label>
                     <input type="text" class="form-control" id="eAnswer1" name="eAnswer1" placeholder="  پاسخ اول  ">
                 </div>
                 <div class="form-group">
                     <label for="eAnswer2"> پاسخ دوم</label>
                     <input type="text" class="form-control" id="eAnswer2" name="eAnswer2" placeholder="پاسخ دوم ">
                 </div>
                 <div class="form-group">
                     <label for="eAnswer3"> پاسخ سوم</label>
                     <input type="text" class="form-control" id="eAnswer3" name="eAnswer3" placeholder="پاسخ سوم ">
                 </div>
                 <div class="form-group">
                     <label for="eAnswer4"> پاسخ چهارم</label>
                     <input type="text" class="form-control" id="eAnswer4" name="eAnswer4" placeholder="پاسخ چهارم ">
                 </div>
                 <div class="form-group">
                     <label for="eCorrectAnswer"> پاسخ صحیح ( از 1 تا 4) </label>
                     <input min="1" max="4" type="number" class="form-control" id="eCorrectAnswer" name="eCorrectAnswer" placeholder="پاسخ صحیح : 3و2و1و4 ">
                 </div>
                 <button  id="editQuizBtn" type="submit" class="btn btn-success mr-6 " > ویرایش </button>
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
 {{--edit quiz modal--}}


 {{--delete quiz modal --}}
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog " role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title"> حذف سوال  <span id="testName"></span> </h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">
     <p>آیا تمایل به حذف این سوال دارید ؟</p>
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
//Edit Quiz
     $(document).on('click','.editBtn',function () {
         crow=$(this).parent().parent();
         cid=crow.children('td').html().trim();
         $("#eCaption").val(crow.children().eq(1).html());
         $("#eAnswer1").val(crow.children().eq(2).html());
         $("#eAnswer2").val(crow.children().eq(3).html());
         $("#eAnswer3").val(crow.children().eq(4).html());
         $("#eAnswer4").val(crow.children().eq(5).html());
         $("#eCorrectAnswer").val(crow.children().eq(6).html());
     });
     $("#editQuizBtn").click(function (event) {
         event.preventDefault();
         var a=  $("#eCaption").val().trim();
         var b=  $("#eAnswer1").val().trim();
         var c=  $("#eAnswer2").val().trim();
         var d=  $("#eAnswer3").val().trim();
         var e=  $("#eAnswer4").val().trim();
         var f=  $("#eCorrectAnswer").val().trim();
         if(a=="")
         {
             alert('متن سوال نمیتواند خالی باشد!');
             return false;
         }
         else if(b=="")
         {
             alert(' پاسخ اول نمیتواند خالی باشد!');
             return false;
         }
         else if(c=="")
         {
             alert(' پاسخ دوم نمیتواند خالی باشد!');
             return false;
         }
         else if(d=="")
         {
             alert(' پاسخ سوم نمیتواند خالی باشد!');
             return false;
         }
         else if(e=="")
         {
             alert(' پاسخ چهارم نمیتواند خالی باشد!');
             return false;
         }
         else if(f=="")
         {
             alert(' پاسخ صحیح را باید انتخاب گنید');
             return false;
         }
         else if( (f<1) || (f>4))
         {
             alert('مقدار وارد شده برای پاسخ صحیح باید مقداری بین 1 تا 4 باشد ');
             return false;
         }
else {
             $.ajax({
                 type: 'post',
                 url: '{{route('editQuizAjax')}}',
                 data: {
                     'testId': '{{$id}}',
                     'qid': cid,
                     "_token": '{{ csrf_token() }}',
                     "caption": a,
                     "q1": b,
                     "q2": c,
                     "q3": d,
                     "q4": e,
                     "qt": f,
                 },
                 cache: false,
                 success: function (res) {
                     if(res=="true")
                     {
                         crow.children().eq(1).html(a);
                         crow.children().eq(2).html(b);
                         crow.children().eq(3).html(c);
                         crow.children().eq(4).html(d);
                         crow.children().eq(5).html(e);
                         crow.children().eq(6).html(f);
                     }

                 }
             });
         }


     });
//Edit Quiz

     //register Quiz
     $("#regQuiz").click(function (event) {
         event.preventDefault();
         var a,b,c,d,f,e;
         a=$("#qCaption").val().trim();
         b=$("#qAnswer1").val().trim();
         c=$("#qAnswer2").val().trim();
         d=$("#qAnswer3").val().trim();
         e=$("#qAnswer4").val().trim();
         f=$("#qCorrectAnswer").val().trim();

         if(a=="")
         {
             alert('متن سوال نمیتواند خالی باشد!');
             return false;
         }
         else if(b=="")
         {
             alert(' پاسخ اول نمیتواند خالی باشد!');
             return false;
         }
         else if(c=="")
         {
             alert(' پاسخ دوم نمیتواند خالی باشد!');
             return false;
         }
         else if(d=="")
         {
             alert(' پاسخ سوم نمیتواند خالی باشد!');
             return false;
         }
         else if(e=="")
         {
             alert(' پاسخ چهارم نمیتواند خالی باشد!');
             return false;
         }
         else if(f=="")
         {
             alert(' پاسخ صحیح را باید انتخاب گنید');
             return false;
         }
         else if( (f<1) || (f>4))
         {
             alert('مقدار وارد شده برای پاسخ صحیح باید مقداری بین 1 تا 4 باشد ');
             return false;
         }
     $.ajax({
             type: 'post',
             url: '{{route('registerQuizAjax')}}',
             data: {
                 'testId':'{{$id}}',
                 "_token": '{{ csrf_token() }}',
                 "caption": a,
                 "q1": b,
                 "q2": c,
                 "q3": d,
                 "q4": e,
                 "qt": f,
             },
             cache: false,
             success: function(res){
                 $(".dataGrid").append(res).show('slow');
                 alert('با موفقیت اضافه شد');
                 $('#registerQuiz').modal('hide');

             }
         });
     });

     //register Quiz


     //Delete Actions
     $(document).on('click','.deleteBtn',function () {
         crow=$(this).parent().parent();
         cid=crow.children('td').html().trim();

     });

     $("#deleteBtn").click(function () {
       $.ajax({
           type: 'post',
           url: '{{route('deleteQuizAjax')}}',
           data: {
               'id':cid,
               "_token": '{{ csrf_token() }}',
           },
           cache: false,
           success: function(res){
               alert(res);
               crow.hide('1500');
           }
       });
       $('#deleteModal').modal('hide');
       //Ajax End
   });
     //Delete Actions


 });


</script>
@stop

