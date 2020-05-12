@extends('layouts.Pmaster');
@section('title-of-page')
    مدیریت کلاس ها
@stop
@section('main-panel')

    <div class="searchBox row">
        <div class="col-md-12 bg-light p-3">
                <h4>  اختیارات</h4>
            <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#registerClassModal">
                <i class="material-icons">assignment</i>
                ثبت کلاس
            </button>            <button class="btn btn-dark btn-round" data-toggle="modal" data-target="#searchModal">
                <i class="material-icons">search</i>
                جستجو کلاس
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
                            <th> کد کلاس</th>
                            <th> نام کلاس</th>
                            <th> کد استاد </th>
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

    {{--Register Class Modal--}}
    <div class="modal fade" id="registerClassModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content">
                <div class="row p-2 ">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-danger">
                                        <div class="card-text">
                                            <h4 class="card-title"> ثبت کلاس  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="registerClassForm" >
                                            <div class="form-group">
                                                <input  type="text" class="form-control" id="className" name="className" placeholder="نام کلاس">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="masterId" name="masterId" placeholder=" کد استاد  ">
                                            </div>
                                            <button  id="regClassBtn" type="submit" class="btn btn-success mr-6 " > ثبت کلاس</button>
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
    {{--Register Class Modal--}}

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
                                            <h4 class="card-title"> جستجو کلاس  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="searchForm" >
                                            <div class="form-group">
                                                <span>کد استاد را وارد کنید</span>
                                                <input  type="text" class="form-control " id="masterCode"  placeholder=" کد استاد  ">
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


    {{--Edit Test Data Modal--}}
    <div class="modal fade" id="editClassModal" tabindex="-1" role="dialog">
        <div class="modal-dialog eModal  " role="document">
            <div class="modal-content">
                <div class="row p-2 ">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-danger">
                                        <div class="card-text">
                                            <h4 class="card-title"> ویرایش کلاس   <span id="editName"></span></h4>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <form  id="editForm">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    نام کلاس:
                                                <span class="input-group-text">
                                                  <i class="fa fa-font"></i>
                                                  </span>
                                                </div>
                                                <input id="editClassName" type="text" class="form-control" placeholder="نام کلاس">
                                            </div>


                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                     استاد کلاس:
                                                    <span class="input-group-text">
                                                  <i class="fa fa-graduation-cap"></i>
                                                  </span>
                                                </div>
                                                <input id="editTestMasterId" type="text" class="form-control" placeholder="کد استاد ">
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
                    <h5 class="modal-title"> حذف کلاس  <span id="testName"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>آیا تمایل به حذف این کلاس دارید ؟</p>
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
            var regExpMasterCode = /^\d*$/;
            var _masterCode,_id,_row,_className;
            //Start Register Action
            $("#regClassBtn").click(function (e) {
                e.preventDefault();
                var clasName=$("#className").val().trim();
                var masterId=$("#masterId").val().trim();
                if(clasName=="")
                {
                   alert("لطفا نام کلاس را وارد کنید");
                   return false;
                }
                else if(masterId=="")
                {
                    alert("لطفا کد استاد را وارد کنید");
                    return false;
                }
                else if(regExpMasterCode.test(masterId)==false)
                {
                    alert("کد استاد نمیتواند شامل حروف باشد ");
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '{{url()->current()}}',
                    data: {
                        "className":clasName,
                        "masterId":masterId,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                         if(res=="false")
                         {
                             alert('انجام نشد . استاد یافت نشد');
                         }
                        else {
                            $(".dataGrid").append(res);
                            $(".datagridbox").slideDown(1000);
                        }
                    }
                })
                //Ajax End

            });
            //End Register Action

            $("#searchBtn").click(function (e) {
                e.preventDefault();
                var masterCode=$("#masterCode").val().trim();
                if(masterCode=="")
                {
                    alert('کد استاد را باید وارد کنید ');
                    return false;
                }
                else if (regExpMasterCode.test(masterCode)==false)
                {
                    alert('کد استاد باید یک عدد باشد ! ');
                    return false;
                }

                //Ajax
                $.ajax({
                    type: 'POST',
                    url: '{{route('searchClassAjax')}}',
                    data: {
                        'id':masterCode,
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
                _masterCode=_row.children().eq(2).html().trim();
                _className=_row.children().eq(1).html().trim();
                $("#editClassName").val(_className);
                $("#editTestMasterId").val(_masterCode);
            });

            $("#editBtnSubmit").click(function (e) {
                e.preventDefault();
                var a,b;
                a= $("#editClassName").val().trim();
                b=$("#editTestMasterId").val().trim();
                if(a=="")
                {
                    alert('نام کلاس را وارد کنید ');
                    return false;
                }
                else if(b=="")
                {
                    alert('کد استاد را باید وارد کنید');
                    return false;
                }
                else if (regExpMasterCode.test(b)==false)
                {
                    alert('کد استاد باید یک عدد باشد');
                    return false;
                }

                $.ajax({
                    type: 'PUT',
                    url: '{{URL::current()}}/'+_id,
                    data: {
                        'id':_id,
                        'className':a,
                        'masterCode':b,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res=="true")
                        {
                            _row.children().eq(2).html(b).fadeIn();
                            _row.children().eq(1).html(a).fadeIn();
                            alert('با موفقیت بروزرسانی شد');
                        }
                        else{
                            alert('با خطا مواجه شدیم! کد استاد موجود نیست ');
                        }

                    }
                });
                $('#editClassModal').modal('hide');
            });
            //End Edit Action

        });
    </script>


@stop