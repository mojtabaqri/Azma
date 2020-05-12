@extends('layouts.Pmaster');
@section('title-of-page')
    مشاهده نتایج
@stop
@section('main-panel')

    <div class="searchBox row">
        <div class="col-md-12 bg-light p-3">
                <h4>  اختیارات</h4>
           <button class="btn btn-outline-danger btn-round" data-toggle="modal" data-target="#searchModal">
                <i class="material-icons">search</i>
                جستجو آزمون
            </button>
        </div>
    </div>


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
                                            <h4 class="card-title"> کد آزمون  </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" id="searchForm" >
                                            <div class="form-group">
                                                <span> کد آزمون را وارد کنید</span>
                                                <input  type="text" class="form-control " id="testResultId"  >
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


    {{--Sarch Box--}}
    <div class="row p-3" >
        <div style="display: none" class="col-md-12  bg-light datagridbox" >
            <div class="row">
                <div class="col-md 12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> کد دانشجو </th>
                            <th>  نام دانشجو</th>
                            <th>  وضعیت شرکت در آزمون </th>
                            <th>   نمره کل کسب شده </th>
                            <th>مشاهده کارنامه </th>
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


    {{--Show Student Result --}}
    <div class="modal fade" id="showResult" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content">
                     <article class="resultmodal">

                     </article>
                </div>
            </div>
    </div>
    {{--Show Student Result --}}




@stop

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            var regExpMasterCode=/^\d*$/;
            $("#searchBtn").click(function (e) {
                e.preventDefault();
                var testResultId=$("#testResultId").val().trim();
                if(testResultId=="")
                {
                    alert('کد آزمون را باید وارد کنید ');
                    return false;
                }
                else if(regExpMasterCode.test(testResultId)==false)
                {
                    alert('کد آزمون باید یک عدد صحیح باشد!');
                    return false;
                }
                //Ajax
                $.ajax({
                    type: 'POST',
                    url: '{{route('searchResult') }}',
                    data: {
                        'testId':testResultId,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        console.log(res);
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


        });
    </script>


@stop