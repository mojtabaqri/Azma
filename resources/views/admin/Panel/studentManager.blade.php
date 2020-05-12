@extends('layouts.Pmaster');
@section('title-of-page')
    مدیریت دانشجو ها
@stop
@section('main-panel')

    <div class="searchBox row">
        <div class="col-md-12 bg-light p-3">
                <h4>  اختیارات</h4>
           <button class="btn btn-outline-danger btn-round" data-toggle="modal" data-target="#searchModal">
                <i class="material-icons">search</i>
                جستجو دانشجو
            </button>
            <button class="btn btn-outline-success btn-round" data-toggle="modal" data-target="#registerStudent">
                <i class="material-icons">person_add</i>
                ثبت دانشجو
            </button>

        </div>
    </div>

{{--Sarch Box--}}
    <div class="row p-3" >
        <div style="display: none" class="col-md-12  bg-light datagridbox" >
            <div class="row">
                <div class="col-md 12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> کد دانشجو</th>
                            <th> کد کاربری دانشجو</th>
                            <th> نام  دانشجو</th>
                            <th>  وضعیت  </th>
                            <th>  مدیریت </th>
                        </tr>
                        </thead>
                        <tbody class="dataGrid">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
{{--search box end--}}




    {{--Search Box Modal Box --}}
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content">
                <div class="row p-2 ">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-info">
                                        <div class="card-text">
                                            <h4 class="card-title"> جستجو دانشجو  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="searchForm" >
                                            <div class="form-group">
                                                <span> نام دانشجو را وارد کنید</span>
                                                <input  type="text" class="form-control " id="studentName"  placeholder="نام و نام خانوادگی دانشجو ">
                                            </div>

                                            <button  id="searchBtn" type="submit" class="btn btn-success mr-6 " > جستجو ...  </button>

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
    {{--Search Box Modal Box--}}


    {{--Register Box Modal Box --}}
    <div class="modal fade" id="registerStudent" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content">
                <div class="row p-2 ">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-info">
                                        <div class="card-text">
                                            <h4 class="card-title"> ثبت دانشجو  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="searchForm" >
                                            <div class="form-group">
                                                <span> نام دانشجو را وارد کنید</span>
                                                <input  type="text" class="form-control " id="sName"  >
                                            </div>
                                            <div class="form-group">
                                                <span> نام  خانوادگی دانشجو را وارد کنید</span>
                                                <input  type="text" class="form-control " id="sLName"  >
                                            </div>
                                            <div class="form-group">
                                                <span> کد ملی دانشجو را وارد کنید</span>
                                                <input  type="text" class="form-control " id="sNc" >
                                            </div>
                                            <div class="form-group">
                                                <span> کد دانشجویی دانشجو را وارد کنید</span>
                                                <input  type="text" class="form-control " id="sc" >
                                            </div>
                                            <button  id="regStdBtn" type="submit" class="btn btn-success mr-6 " > ثبت !  </button>
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
    {{--Register Box Modal Box--}}


    {{--Edit Test Data Modal--}}
    <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog eModal  " role="document">
            <div class="modal-content">
                <div class="row p-2 ">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-danger">
                                        <div class="card-text">
                                            <h4 class="card-title"> ویرایش دانشجو   <span id="editName"></span></h4>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <form  id="editForm">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    نام دانشجو:
                                                <span class="input-group-text">
                                                  <i class="fa fa-font"></i>
                                                  </span>
                                                </div>
                                                <input id="editStudentName" type="text" class="form-control" placeholder="نام دانشجو">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    کد دانشجویی:
                                                    <span class="input-group-text">
                                                  <i class="fa fa-font"></i>
                                                  </span>
                                                </div>
                                                <input id="editUserName" type="text" class="form-control" placeholder="کد دانشجو">
                                            </div>

                                            <div class="form-group">
                                                <label for="editStudentState">وضعیت دانشجو </label>
                                                <select class="form-control bootstrap-select" data-style="btn btn-link" id="editStudentState" >
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیر فعال</option>
                                                </select>
                                            </div>

                                           <div class="form-group float-left mt-5">
                                               <button  type="submit" id="editBtnSubmit"  class="btn btn-success ml-5 " > ویرایش </button>
                                           </div>
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
    {{-- End Edit Test Data Modal--}}

    {{--Delete Test Data Modal--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> حذف دانشجو  <span id="testName"></span> </h5>
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
    {{-- Delete Test Data Modal--}}




@stop

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            var regExpMasterCode=/^\d*$/;
            var _id,_row,_studentName,_studentUserName;
            $("#searchBtn").click(function (e) {
                e.preventDefault();
                var studentName=$("#studentName").val().trim();
                if(studentName=="")
                {
                    alert('نام دانشجو را باید وارد کنید ');
                    return false;
                }
                //Ajax
                $.ajax({
                    type: 'POST',
                    url: '{{route('searchStudentAjax')}}',
                    data: {
                        'name':studentName,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res!=="false")
                        {
                            $(".dataGrid").html("");
                            $(".dataGrid").append(res);
                            $(".datagridbox").slideDown(2000);
                        }
                        else {
                            alert('یافت نشد!');
                        }
                    }
                });
              //Ajax End
            });
            //Start Delete Action
            $(document).on('click','.deleteBtn',function () {
                _row=$(this).parent().parent();
                _id=_row.children('td').html().trim();
            });
            $("#deleteBtn").click(function () {
                $.ajax({
                    type: 'DELETE',
                    url: '{{URL::current()}}/'+_id,
                    data: {
                        'id':_id,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res=="true")
                        {
                            alert('با موفقیت حذف شد');
                            _row.hide('1500');
                        }
                        else {
                            alert('حذف نشد ! ');
                        }
                    }
                });
                $('#deleteModal').modal('hide');
            })
            //End Delete Action

            //Start Edit Action
            $(document).on('click','.editBtn',function () {
                _row=$(this).parent().parent();
                _id=_row.children('td').html().trim();
                _studentName=_row.children().eq(2).html().trim();
                _studentUserName=_row.children().eq(1).html().trim();
                $("#editStudentName").val(_studentName);
                $("#editUserName").val(_studentUserName);
            });

            $("#editBtnSubmit").click(function (e) {
                e.preventDefault();
                var a,b,c;
                a= $("#editStudentName").val().trim();
                b=$("#editUserName").val().trim();
                c=$(".eModal option:selected").val();
                if(a=="")
                {
                    alert('نام کلاس را وارد کنید ');
                    return false;
                }
                else if(b=="")
                {
                    alert('کد دانشجویی را باید وارد کنید');
                    return false;
                }
                else if (regExpMasterCode.test(b)==false)
                {
                    alert('کد دانشجویی باید یک عدد باشد');
                    return false;
                }
                $.ajax({
                    type: 'PUT',
                    url: '{{URL::current()}}/'+_id,
                    data: {
                        'id':_id,
                        'studentName':a,
                        'studentCode':b,
                        'studentState':c,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res=="true")
                        {
                            _row.children().eq(2).html(a).fadeIn();
                            _row.children().eq(1).html(b).fadeIn();
                            if(c>0)
                                _row.children().eq(3).html("فعال").fadeIn();
                            else
                                _row.children().eq(3).html("غیرفعال").fadeIn();

                            alert('با موفقیت بروزرسانی شد');
                        }
                        else{
                            alert('با خطا مواجه شدیم! کد استاد موجود نیست ');
                        }

                    }
                });
                $('#editStudentModal').modal('hide');
            });
            //End Edit Action

            //Register Student

            $("#regStdBtn").click(function (e) {
                e.preventDefault();
                var    sc ,    sName ,  sNc, sLName;
                sName=$("#sName").val().trim();
                sLName=$("#sLName").val().trim();
                sNc=$("#sNc").val().trim();
                sc=$("#sc").val().trim();
                if(sName=="") {
                    alert("نام دانشجو نمیتواند خالی باشد!");
                    return false;}
                else if(sLName=="") {
                    alert("نام خانوادگی دانشجو را وارد کنید !");
                    return false;}
                else if(sc=="") {
                    alert("کد  دانشجویی نمیتواند خالی باشد !");
                    return false;}
                else if(regExpMasterCode.test(sc)==false) {
                    alert("کد  دانشجویی نمیتواند به جز عدد صحیح  باشد !");
                    return false;}
                else if(sNc=="") {
                    alert("کد ملی دانشجو نمیتواند خالی باشد !");
                    return false;}
                else if(regExpMasterCode.test(sNc)==false) {
                    alert("کد  ملی دانشجو نمیتواند به جز عدد صحیح  باشد !");
                    return false;}

                $.ajax({
                    type: 'POST',
                    url: '{{URL::current()}}',
                    data: {
                        'sc':sc,
                        'sName':sName,
                        'sNc':sNc,
                        'sLName':sLName,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                  console.log(res);
switch (res) {
    case "1":
        alert("با موفیت اضافه شد !");
        break;
    case "3":
    alert('کد دانشجویی تکراری است!');
        break;
    default:
        alert("خطای سروری !");
        break;
}
                    }
                });

            });
            //End Register Student

        });
    </script>


@stop