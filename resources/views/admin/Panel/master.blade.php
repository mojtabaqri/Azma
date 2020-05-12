
@extends('layouts.Pmaster');
@section('title-of-page')
    مدیریت استاد ها
@stop
@section('main-panel')

    <div class="searchBox row">
        <div class="col-md-12 bg-light p-3">
                <h4>  اختیارات</h4>
           <button class="btn btn-outline-danger btn-round" data-toggle="modal" data-target="#searchModal">
                <i class="material-icons">search</i>
                جستجو استاد
            </button>
            <button class="btn btn-outline-success btn-round" data-toggle="modal" data-target="#registerStudent">
                <i class="material-icons">person_add</i>
                ثبت استاد
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
                            <th> کد استاد</th>
                            <th>  نام استاد</th>
                            <th> کد ملی   استاد</th>
                            <th>  شماره تماس  </th>
                            <th>  وضعیت   </th>
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
                                            <h4 class="card-title"> جستجو استاد  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="searchForm" >
                                            <div class="form-group">
                                                <span> نام استاد را وارد کنید</span>
                                                <input  type="text" class="form-control " id="studentName"  placeholder="نام و نام خانوادگی استاد ">
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
                                            <h4 class="card-title"> ثبت استاد  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="searchForm" >
                                            <div class="form-group">
                                                <span> نام استاد را وارد کنید</span>
                                                <input  type="text" class="form-control " id="masterName"  >
                                            </div>

                                            <div class="form-group">
                                                <span>  ایمیل استاد را وارد کنید</span>
                                                <input   type="email" class="form-control " required id="masterEmail" >
                                            </div>

                                            <div class="form-group">
                                                <span> کد ملی استاد را وارد کنید</span>
                                                <input  type="text" class="form-control " id="masterNt" >
                                            </div>


                                            <div class="form-group">
                                                <span> شماره تماس   استاد را وارد کنید</span>
                                                <input  type="text" class="form-control " id="masterPhone" >
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
                                            <h4 class="card-title"> ویرایش استاد   <span id="editName"></span></h4>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <form  id="editForm">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    نام استاد:
                                                <span class="input-group-text">
                                                  <i class="fa fa-font"></i>
                                                  </span>
                                                </div>
                                                <input id="editStudentName" type="text" class="form-control" placeholder="نام استاد">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    کد ملی  استاد:
                                                    <span class="input-group-text">
                                                  <i class="fa fa-font"></i>
                                                  </span>
                                                </div>
                                                <input id="editUserName" type="text" class="form-control" placeholder="کد استاد">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    شماره تماس   استاد:
                                                    <span class="input-group-text">
                                                  <i class="fa fa-font"></i>
                                                  </span>
                                                </div>
                                                <input id="editPhone" type="text" class="form-control" placeholder=" شماره تماس ">
                                            </div>
                                            <div class="form-group">
                                                <label for="editStudentState">وضعیت استاد </label>
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
                    <h5 class="modal-title"> حذف استاد  <span id="testName"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>آیا تمایل به حذف این استاد دارید ؟</p>
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
            var _id,_row,_studentName,_studentUserName,_masterPhone;
            $("#searchBtn").click(function (e) {
                e.preventDefault();
                var studentName=$("#studentName").val().trim();
                if(studentName=="")
                {
                    alert('نام استاد را باید وارد کنید ');
                    return false;
                }
                //Ajax
                $.ajax({
                    type: 'POST',
                    url: '{{route('searchMaster') }}',
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
                _studentName=_row.children().eq(1).html().trim();
                _studentUserName=_row.children().eq(2).html().trim();
                _masterPhone=_row.children().eq(3).html().trim();
                $("#editStudentName").val(_studentName);
                $("#editUserName").val(_studentUserName);
                $("#editPhone").val(_masterPhone);
            });

            $("#editBtnSubmit").click(function (e) {
                e.preventDefault();
                var a,b,c,d;
                a= $("#editStudentName").val().trim();
                b=$("#editUserName").val().trim();
                c=$(".eModal option:selected").val();
                d=$("#editPhone").val().trim();
                if(a=="")
                {
                    alert('نام استاد را وارد کنید ');
                    return false;
                }
                else if(b=="")
                {
                    alert('کد استادی را باید وارد کنید');
                    return false;
                }
                else if(d=="")
                {
                    alert('شماره استاد را باید وارد کنید');
                    return false;
                }
                else if (regExpMasterCode.test(d)==false)
                {
                    alert('شماره استاد باید یک عدد باشد');
                    return false;
                }
                else if (regExpMasterCode.test(b)==false)
                {
                    alert('کد استادی باید یک عدد باشد');
                    return false;
                }

                $.ajax({
                    type: 'PUT',
                    url: '{{URL::current()}}/'+_id,
                    data: {
                        'id':_id,
                        'masterName':a,
                        'masterPhone':d,
                        'masterNtCode':b,
                        'state':c,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res=="true")
                        {
                            _row.children().eq(1).html(a).fadeIn();
                            _row.children().eq(2).html(b).fadeIn();
                            _row.children().eq(3).html(d).fadeIn();

                            if(c>0)
                                _row.children().eq(4).html("فعال").fadeIn();
                            else
                                _row.children().eq(4).html("غیرفعال").fadeIn();

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
                var    masterName,masterNt,masterPhone,masterEmail;
                masterName=$("#masterName").val().trim();
                masterNt=$("#masterNt").val().trim();
                masterPhone=$("#masterPhone").val().trim();
                masterEmail=$("#masterEmail").val().trim();
                if(masterEmail=="") {

                    alert("ایمیل استاد نمی تواند خالی باشد ");
                    return false;
                }

                if(masterName=="") {
                    alert("نام استاد نمیتواند خالی باشد!");
                    return false;}
                else if(masterNt=="") {
                    alert("کد  ملی استاد نمیتواند خالی باشد !");
                    return false;}
                else if(regExpMasterCode.test(masterPhone)==false) {
                    alert("شماره تماس  استاد نمیتواند به جز عدد صحیح  باشد !");
                    return false;}
                else if(regExpMasterCode.test(masterNt)==false) {
                    alert("کد  ملی استاد نمیتواند به جز عدد صحیح  باشد !");
                    return false;}

                $.ajax({
                    type: 'POST',
                    url: '{{route('storeMaster')}}',
                    data: {
                        'name':masterName,
                        'phone':masterPhone,
                        'nationalCode':masterNt,
                        'email':masterEmail,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                  console.log(res);
switch (res) {
    case "1":
        alert("با موفیت اضافه شد !");
        break;
    case "0":
        alert("اضافه نشد  ! ");

        break;
    default:
        alert(res);
        break;
}
                    }
                });

            });
            //End Register Student

        });
    </script>


@stop