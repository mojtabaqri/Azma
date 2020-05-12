@extends('layouts.Pstudent')
@section('title-of-page')
پنل دانشجو @unless(empty(Session::has('studentLogin')))
               شماره {{Session::get('studentLogin')}}
@endunless
    @stop

@section('main-panel')
 <div class="container">
<div class="boxholder p-3">

    <div class="alert-dismissible alert-warning">
        توجه : هنگام ایجاد تغیرات در لیست دانشجویان یا اساتید منظور از کد دانشجو کد ثبت نام وی میباشد.
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <p class="card-category">  تعداد آزمون   های شرکت کرده  </p>
                    <h3 class="card-title">
                        @unless(empty($quizCount))
                            {{$quizCount}}
                        @endunless
                        <small>عدد</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-success">warning</i>
                        <a href="#pablo">  وضعیت مناسب است!   </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">done_all</i>
                    </div>
                    <p class="card-category"> امتیاز شما   </p>
                    <h3 class="card-title">
                        @unless(empty($stdPoint))
                            {{$stdPoint}}
                        @endunless
                        <small></small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> هم&zwnj;اکنون
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-male"></i>
                    </div>
                    <p class="card-category"> امتیاز کل دانشجویان</p>
                    <h3 class="card-title">
                        @unless(empty($stdMaxPoint))
                        {{$stdMaxPoint}}
@endunless
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> هم&zwnj;اکنون
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title"> آزمون های درحال برگزاری    </h4>
                    <p class="card-category">شما میتوانید از طریق این قسمت در آزمون ها شرکت کنید !</p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-dark">
                        <tr><th>   کد آزمون</th>
                            <th>وضعیت شرکت در آزمون</th>
                            <th>   نام آزمون</th>
                            <th> زمان  پایان آزمون </th>
                            <th>      عملیات </th>
                        </tr></thead>
                        <tbody>
                        @unless(empty($quizez))
                            @foreach($quizez as $item)
                                <tr>
                                    <td> {{$item->testId}}  </td>
                                    <td>@if(($item->state)>0) شرکت کرده
                                            @else

شرکت نکرده
                                             @endif </td>
                                    <td> {{\App\Test::find($item->testId)->first()->name}} </td>
                                    <td>  {{$item->expire}}  </td>
                                    <td>
                                        @if((($item->point)==0)&&($item->state==0))
                                            <a href="./startQuiz/quiz/{{$item->id}}/{{Session::get('studentLogin')}}"> شرکت در آزمون</a>  </td>
                                @else
                                    غیر فعال
                                        @endif
                                </tr>
                                @endforeach
                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

 </div>
@stop

@section('scripts')
<script type="text/javascript">
 $(document).ready(function () {

 });


</script>
@stop

