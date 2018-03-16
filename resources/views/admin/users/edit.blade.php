@extends('layouts.admin')



@section('content')

    <div class="col-xl-2">
        <img height="150" width="150" src="{{$user->photo ? $user->photo->path : '/images/1.png'}}" alt="تصویر کاربر" class="im-fluid rounded">
    </div>
    <div class="col-xl-8">
    <form class="align-content-center" method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <label for="name">نام و نام خانوادگی:</label>
        <input class="form-control m-2" type="text" name="name" value="{{$user->name}}" placeholder="نام و نام خانوادگی خود را وارد کنید" style="color: #101010; font-size: 10pt;">

        <label for="email">ایمیل:</label>
        <input class="form-control m-2" type="text" name="email" value="{{$user->email}}" placeholder="برای مثال Code@facaulty.com" style="color: #101010; font-size: 10pt;">

        <label for="role_id">سطح دسترسی:</label>
        <select class="form-control m-2" id="role_id" name="role_id" style="color: #101010; font-size: 10pt;">
            <option value="" selected="selected">{{$user->role->name}}</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>

        <label for="is_active">وضعیت:</label>
        <select class="form-control m-2" id="is_active" name="is_active" style="color: #101010; font-size: 10pt;">
            <option value="{{$user->is_active}}" selected="selected">{{$user->is_active == 1 ? 'فعال' : 'غیرفعال'}}</option>
            <option value="1">فعال</option>
            <option value="0">غیر فعال</option>
        </select>

        <label for="photo_id">تصویر:</label>
        <input class="form-control m-2"  type="file"  name="photo_id" style="color: #101010; font-size: 10pt;">

        <label for="password">رمز عبور :</label>
        <input class="form-control m-2" type="text" name="password" placeholder="رمز عبور را وارد کنید" style="color: #101010; font-size: 10pt;">

        <input class="btn btn-outline-success m-2" type="submit" name="submit" value="ویرایش">


    </form>
        @include('includes.form_error')
    </div>


@stop