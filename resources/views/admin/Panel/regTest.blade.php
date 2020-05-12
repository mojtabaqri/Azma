@extends('layouts.Pmaster');
@section('title-of-page')
    ثبت آزمون
@stop
@section('main-panel')

    <div class="searchBox row">
        <div class="col-md-12 bg-light p-3">
                <h4>  اختیارات</h4>
            <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#signupModal">
                <i class="material-icons">assignment</i>
                ثبت آزمون
            </button>            <button class="btn btn-info btn-round" data-toggle="modal" data-target="#searchModal">
                <i class="material-icons">search</i>
                جستجو آزمون
            </button>
        </div>
    </div>

{{--Sarch Box--}}
    <div class="row p-3">
        <div class="col-md-12  bg-dark datagridbox">

        </div>
    </div>
{{--search box end--}}

    {{--Register Test Modal--}}
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content">
                <div class="row p-2 ">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title"> ثبت آزمون  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="registerTestForm" >
                                            <div class="form-group">
                                                <input  type="text" class="form-control" id="quizName" name="quizName" placeholder="نام آزمون">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="masterId" name="masterId" placeholder=" کد استاد  ">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="quizTime" name="quizTime" placeholder="زمان آزمون  |  ثانیه :دقیقه :ساعت   00:30:00 ">
                                            </div>
                                            <button  id="regTest" type="submit" class="btn btn-success mr-6 " > ثبت اطلاعات</button>
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
    {{-- END Register Test Modal--}}

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
                                            <h4 class="card-title"> جستجو آزمون  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="searchForm" >
                                            <div class="form-group">
                                                <span>کد استاد را وارد کنید</span>
                                                <input  type="text" class="form-control " id="masterCode"  placeholder=" کد استاد  ">
                                            </div>
                                            <button  id="searchTest" type="submit" class="btn btn-success mr-6 " > جستجو اطلاعات</button>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog eModal  " role="document">
            <div class="modal-content">
                <div class="row p-2 ">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-danger">
                                        <div class="card-text">
                                            <h4 class="card-title"> ویرایش آزمون   <span id="editName"></span></h4>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <form  id="editForm">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    نام آزمون:
                                                <span class="input-group-text">
                                                  <i class="fa fa-font"></i>
                                                  </span>
                                                </div>
                                                <input id="editTestName" type="text" class="form-control" placeholder="نام آزمون">
                                            </div>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    زمان آزمون:
                                                    <span class="input-group-text">
                                                  <i class="fa fa-hourglass-half"></i>
                                                  </span>
                                                </div>
                                                <input id="editTestTime" type="text" class="form-control" placeholder="زمان آزمون">
                                            </div>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                     استاد آزمون:
                                                    <span class="input-group-text">
                                                  <i class="fa fa-graduation-cap"></i>
                                                  </span>
                                                </div>
                                                <input id="editTestMasterId" type="text" class="form-control" placeholder="کد استاد آزمون">
                                            </div>

                                            وضعیت آزمون
                                            <div class="form-check form-check-radio form-check-inline m-3">
                                                <label class="form-check-label">
                                                    <input class="form-check-input " type="radio"  name="state" id="active" value="1" >
                                                    <span class="circle">
                                                   <span class="check"></span>
                                                    </span>
                                                </label>
                                                <span> فعال </span>

                                            </div>
                                            <div class="form-check form-check-radio form-check-inline m-3" >
                                                <label class="form-check-label">
                                                    <input class="form-check-input " type="radio"  name="state" id="nonActive" value="0">
                                                    <span class="circle">
                                                       <span class="check"></span>
                                                       </span>
                                                </label>
                                                <span>غیر فعال </span>

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
                    <h5 class="modal-title"> حذف آزمون  <span id="testName"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>آیا تمایل به حذف این آزمون دارید ؟</p>
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
            //Start RegTest Form controller
            var regExpTestForm = /(([0-1][0-9])|([2][0-3])):([0-5][0-9]):([0-5][0-9])/;
            var regExpMasterCode=/^\d*$/;
            $("#regTest").click(function (event) {
                event.preventDefault();
                var time = $("#quizTime").val();
                var masterId = $("#masterId").val();
                var testName = $("#quizName").val();
             if(testName =="")
                {
                    alert(' نام آزمون را وارد کنید');
                    return false;
                }
                else if(masterId=="")
                {
                    alert('کد استاد را وارد کنید');
                    return false;
                }

                else   if (regExpMasterCode.test(masterId)==false)
                {
                    alert('کد استاد باید از نوع عدد صحیح  باشد ');
                    return false;
                }
                else if (regExpTestForm.test(time)==false)
                {
                    alert('فرمت تاریخ وارد شده اشتباه است لطفا دقت کنید!');
                    return false;
                }
                //Ajax
                $.ajax({
                    type: 'post',
                    url: '{{route('ajax')}}',
                    data: {
                        'masterId' : masterId,
                        'testName' : testName,
                        'testTime' : time,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        alert(res);
                    }
                })
                //Ajax End
            });


            $("#searchTest").click(function (event) {
                event.preventDefault();
                $(".datagridbox").html("");
                var masterCode = $("#masterCode").val();
                if(masterCode=="")
                {
                    alert("کد استاد را باید وارد کنید");
                    return false;
                }
                else if(regExpMasterCode.test(masterCode)==false)
                {
                    alert("کد استاد باید از نوع عدد صحیح باشد ");
                    return false;
                }
                //ajax
                //send
                $.ajax({
                    type: 'post',
                    url: '{{route('ajaxSearch')}}',
                    data: {
                        'masterId' : masterCode,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){

                        if(typeof (res)=='string')
                        {
                            alert(res);
                        }
                        else {
                            var gridbox='            <table class="table text-light">\n' +
                                '                <thead>\n' +
                                '                <tr>\n' +
                                '                    <th class="text-center">کد آزمون</th>\n' +
                                '                    <th>نام آزمون</th>\n' +
                                '                    <th> کد استاد </th>\n' +
                                '                    <th>زمان</th>\n' +
                                '                    <th class="text-right">وضعیت</th>\n' +
                                '                </tr>\n' +
                                '                </thead>\n' +
                                '                <tbody class="datagride">\n' +
                                '\n' +
                                '                </tbody>\n' +
                                '            </table>\n';
                            $(".datagridbox").html(gridbox);
                            //pars json array
                            $.each(res,function (index,value) {
                                if(value['state']>0)
                                    value['state']="فعال";
                                else
                                    value['state']="غیر فعال";
                                var rowItem="                        <tr>\n" +
                                    "                            <td class=\"text-center\">"+value['id']+"</td>\n" +
                                    "                            <td id='tName' title='"+value['name']+"'>"+value['name']+"</td>\n" +
                                    "                            <td id='tMasterId' title='"+value['masterId']+"' >"+value['masterId']+"</td>\n" +
                                    "                            <td id='tTime' title='"+value['time']+"' >"+value['time']+"</td>\n" +
                                    "                            <td id='tState' title='"+value['state']+"' class=\"text-right\">"+value['state']+"\n" +
                                    "                              \n" +
                                    "                            </td>\n" +
                                    "                            <td class=\"td-actions text-right\">\n" +
                                    "                               <a target='_blank' href='./quiz-"+value['id']+"' ><button id='"+value['id']+"' data-target='#quizModal' data-toggle='modal' type=\"button\" rel=\"tooltip\" class=\"btn btn-info quizBtn\">\n" +
                                    "                                    <i class=\"material-icons\">person</i>\n" +
                                    "                                </button></a>\n" +
                                    "                               <button  id='"+value['id']+"' data-target='#editModal' data-toggle='modal' type=\"button\" rel=\"tooltip\" class=\"btn btn-success editBtn \">\n" +
                                    "                                    <i class=\"material-icons\">edit</i>\n" +
                                    "                                </button>\n" +
                                    "                             <button id='"+value['id']+"' data-target='#deleteModal' data-toggle='modal' type=\"button\" rel=\"tooltip\" class=\"btn btn-danger deleteBtn \">\n" +
                                    "                                    <i class=\"material-icons\">close</i>\n" +
                                    "                                </button>\n" +
                                    "                            </td>\n" +
                                    "                        </tr>";
                                $(".datagride").append(rowItem);

                            })
                            //end pars json array
                        }
                    }
                })
                //ajax
            });
            //End RegTest Form controller
            //editBtn btn controller
              var state;
              var trow;
            $(document).on('click','.editBtn',function () {
                id=$(this).attr('id');
                testname = $(this).parent().parent().find("#tName").attr('title');
                tMasterCode = $(this).parent().parent().find("#tMasterId").attr('title');
                tTime = $(this).parent().parent().find("#tTime").attr('title');
                trow=$(this).parent().parent();
                $("#editName").text(testname);
                $("#editTestName").val(testname);
                $("#editTestTime").val(tTime);
                $("#editTestMasterId").val(tMasterCode);

            });
            $("#active").click(function () {
                state=1;
            });
            $("#nonActive").click(function () {
            state=0;
            });
            $("#editBtnSubmit").click(function (event) {
                event.preventDefault();
                var name = $("#editTestName").val().trim();
                var time = $("#editTestTime").val();
                var master = $("#editTestMasterId").val();
                if(state==null)
                {
                    alert('وضعیت را باید انتخاب کنید');
                    return false;
                }
                if(master=="")
                {
                    alert('کد استاد نمیتواند خالی باشد');
                    return false;
                }
                else if(regExpMasterCode.test(master)==false)
                {
                    alert('کد استاد اشتباه وارد شده');
                    return false;
                }
               else if(regExpTestForm.test(time)==false)
                {
                    alert('فرمت تاریخ وارد شده اشتباه است ');
                    return false;
                }
                $.ajax({
                    type: 'post',
                    url: '{{route('ajaxEdit')}}',
                    data: {
                        'id':id,
                        'masterId' : master,
                        'testName' : name,
                        'testTime' : time,
                        'testState' : state,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                       alert(res);
                       trow.children('#tName').text(name).fadeIn(2000);
                       trow.children('#tMasterId').text(master).fadeIn(2000);
                       trow.children('#tTime').text(time).fadeIn(2000);
                       if(state>0)
                       trow.children('#tState').text("فعال").fadeIn(2000);
                       else
                           trow.children('#tState').text("غیر فعال").fadeIn(2000);

                    }
                })
                //Ajax End


            });


            //editBtn btn controller

            //deleteBtn btn controller
            var id;
            var testname;
            var row;
            var tMasterCode;
            var tTime;
            $(document).on('click','.deleteBtn',function () {
                id=$(this).attr('id');
                testname = $(this).parent().parent().find("#tName").attr('title');
                row=$(this).parent().parent();
                $("#testName").text(testname+"  با کد "+id);

            });
            $("#deleteBtn").click(function () {
                //Ajax
                $.ajax({
                    type: 'post',
                    url: '{{route('ajaxDelete')}}',
                    data: {
                        'id' : id,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res=="true"){
                            alert('با موفقیت حذف شد');
                            row.hide(500);
                        }
                        else{
                            alert('حذف نشد');
                        }
                        $('#deleteModal').modal('hide');

                    }
                });
                //Ajax End


            })
            //deleteBtn btn controller




        });


    </script>


@stop