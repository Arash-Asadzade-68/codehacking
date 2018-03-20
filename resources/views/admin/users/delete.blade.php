@extends('layouts.admin')



@section('content')

    <div class="col-xl-10">
        <h3 style="color: #bbb; padding-bottom: 10px;">آیا میخواهید کاربر با مشخصات زیر را حذف کنید؟</h3>
        <div class="row">
            <div class="col-sm-4" >
                <img height="150" width="150"  src="{{$user->photo ? $user->photo->path : '/images/1.png'}}"
                     alt="تصویر کاربر" class="im-fluid rounded">
            </div>
            <div class="col-sm-8">

                <ul class="delete" style="font-size: 16pt;">

                    <li><span>نام و نام خانوادگی:</span>{{$user->name}}</li>

                    <li><span>ایمیل:</span>{{$user->email}}</li>

                    <li><span>سطح دسترسی:</span>{{$user->role->name}}</li>

                    <li><span>وضعیت:</span>{{$user->is_active == 1 ? 'فعال' : 'غیر فعال'}}</li>

                </ul>

            </div>
        </div>
        <div class="row" style="margin-top: 40px">
            <div class="col-sm-6 center">
                <form class="align-content-center" method="Post" action="/admin/users/{{$user->id}}">
                    @csrf
                    @method('DELETE')

                    <input class="btn btn-outline-danger" style="padding-right: 40px; padding-left: 40px;" type="submit"
                           name="submit" value="حذف کاربر">


                </form>
            </div>
            <div class="col-sm-6 center" >
                <a href="{{route('users.index')}}" class="btn btn-outline-success"
                   style="padding-right: 48px; padding-left: 48px; ">بازگشت</a>
            </div>

        </div>
    </div>



@stop