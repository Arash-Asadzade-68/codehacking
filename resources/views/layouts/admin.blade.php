<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @yield('styles')

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #fff;">
        <div class="container">
            <img src="{{asset('images/1.png')}}" alt="apple" class="navbar-brand">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">خدمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ارتباط با ما</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
{{--<!---Navbar End--!>--}}
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="float-right">
                <div class="dropdown">
                    <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-user" style="padding-left: 5px;"></span><span  style="padding-left: 5px;">{{Auth::user()->name}}</span> <span class=" fa fa-caret-down"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><span class="fa fa-user" style="padding-left: 5px;"></span><span>پروفایل</span></a>
                        <a class="dropdown-item" href="#"><span class="fa fa-gear" style="padding-left: 5px;"></span><span>تنضیمات</span></a>
                        <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <span class="fa fa-sign-out" style="padding-left: 5px;"></span><span>خروج</span></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-3 float-left" style="padding-left: 0; padding-top: 5px;">
            <div class="input-group ">
                <input class="form-control" placeholder="جست و جو..." type="text">
                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" style="border: 1px solid #ccc">
                                        <i class="fa fa-search" ></i>
                                    </button>
                </span>
            </div>
        </div>


    </div>


    <div class="row" style="margin-top: 10px;">
        <div class="col-xl-2"style="background-color: #fff" >

            <div id="accordion">
                <div class="card">
                    <div class="card-header">

                        <span class="fa fa-dashboard" style="padding-left: 5px;"></span><span>داشبورد</span>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-wrench" style="padding-left: 5px;"></span><span>کاربران</span>
                        <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="fa fa-angle-right ChangeArrow" style="float: left;"></span>
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse">
                        <div class="card-body">
                            <a class="dropdown-item" href="{{route('users.index')}}">همه کاربران</a>
                            <a class="dropdown-item" href="{{route('users.create')}}">ایجاد کاربر</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-wrench" style="padding-left: 5px;"></span><span>پست ها</span>
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <span class="fa fa-angle-right ChangeArrow" style="float: left;"></span>
                        </a>

                    </div>

                    <div id="collapseTwo" class="collapse">
                        <div class="card-body">
                            <a class="dropdown-item" href="{{route('posts.index')}}">همه پست ها</a>
                            <a class="dropdown-item" href="{{route('posts.create')}}">ایجاد پست</a>
                            <a class="dropdown-item" href="{{route('comments.index')}}">کامنت ها</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-wrench" style="padding-left: 5px;"></span><span>دسته ها</span>
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">

                            <span class="fa fa-angle-right ChangeArrow" style="float: left;"></span>
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse">
                        <div class="card-body">
                            <a class="dropdown-item" href="{{route('categories.index')}}">همه دسته ها</a>
                            <a class="dropdown-item" href="{{route('categories.index')}}">ایجاد دسته</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-wrench" style="padding-left: 5px;"></span><span>چند رسانه ایی</span>
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">

                            <span class="fa fa-angle-right ChangeArrow" style="float: left;"></span>
                        </a>
                    </div>
                    <div id="collapseFour" class="collapse">
                        <div class="card-body">
                            <a class="dropdown-item" href="{{route('media.index')}}">مدیا</a>
                            <a class="dropdown-item" href="{{route('media.create')}}">آپلود</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-bar-chart" style="padding-left: 5px;"></span><span>چارت ها</span>
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">

                            <span class="fa fa-angle-right ChangeArrow" style="float: left;"></span>
                        </a>
                    </div>
                    <div id="collapseFive" class="collapse">
                        <div class="card-body">
                            <a class="dropdown-item" href="#"> همه نمودارها</a>
                            <a class="dropdown-item" href="#">رسم چارت</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span class="fa fa-table" style="padding-left: 5px;"></span><span>جداول</span>
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">

                            <span class="fa fa-angle-right ChangeArrow" style="float: left;"></span>
                        </a>
                    </div>
                    <div id="collapseSix" class="collapse">
                        <div class="card-body">
                            <a class="dropdown-item" href="#"> همه جداول</a>
                            <a class="dropdown-item" href="#">رسم جدول</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>

            @yield('content')


    </div>

</div>


</body>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/MyScripts.js')}}"></script>
@yield('scripts')
</html>