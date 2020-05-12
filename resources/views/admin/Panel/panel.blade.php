@extends('layouts.Pmaster')
@section('title-of-page')
    پنل مدیریت آزما
    @stop
@section('main-panel')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">  تعداد آزمون   ها  </p>
                        <h3 class="card-title">
                            {{$info['questionCount']}}
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

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">done_all</i>
                        </div>
                        <p class="card-category">تعداد سوالات  </p>
                        <h3 class="card-title">
                            {{$info['successQuizCount']}}

                            <small>عدد</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> هم&zwnj;اکنون
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons ">info</i>
                        </div>
                        <p class="card-category">    تعداد دانشجویان</p>
                        <h3 class="card-title">
                            {{$info['stduentCount']}}

                            <small>عدد</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> هم&zwnj;اکنون
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-male"></i>
                        </div>
                        <p class="card-category">تعداد اساتید</p>
                        <h3 class="card-title"> {{$info['masterCount']}}
                            <small>عدد</small>

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
                    <div class="card-header card-header-warning">
                        <h4 class="card-title"> دانش آموزان برتر  </h4>
                        <p class="card-category">برترین دانش آموزان این ماه</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                            <tr><th> کد ثبت نام</th>
                                <th>نام</th>
                                <th>کد داشنجویی</th>
                                <th>وضعیت </th>
                            </tr></thead>
                            <tbody>
                                @unless(empty($student))
                                     @foreach($student as $item)
                                         <tr>
                                             <td>{{$item['id']}} </td>
                                             <td>{{$item['fullName']}} </td>
                                             <td>{{$item['username']}} </td>
                                             <td> فعال </td>
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
    @stop