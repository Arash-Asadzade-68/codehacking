@extends('layouts.admin')



@section('content')
<h1 style="color: blue; padding-bottom: 20px;">ایجاد کاربر جدید </h1>
<form class="align-content-center" method="Post" action="/admin/users" enctype="multipart/form-data" style="">
            @csrf
    <label for="name">نام و نام خانوادگی:</label>
            <input class="form-control m-2" type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید" style="color: #cccccc; font-size: 10pt;">

    <label for="email">ایمیل:</label>
            <input class="form-control m-2" type="text" name="email" placeholder="برای مثال Code@facaulty.com" style="color: #cccccc; font-size: 10pt;">

    <label for="role_id">سطح دسترسی:</label>
    <select class="form-control m-2" id="role_id" name="role_id" style="color: #101010; font-size: 10pt;">
        <option value="" selected="selected">انتخاب کنید</option>
        @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
    </select>

    <label for="is_active">وضعیت:</label>
    <select class="form-control m-2" id="is_active" name="is_active" style="color: #101010; font-size: 10pt;">
        <option value="1">فعال</option>
        <option value="0" selected="selected">غیر فعال</option>
    </select>

    <label for="photo_id">تصویر:</label>
    <input class="form-control m-2"  type="file" name="photo_id" style="color: #101010; font-size: 10pt;">

    <label for="password">رمز عبور :</label>
             <input class="form-control m-2" type="text" name="password" placeholder="رمز عبور را وارد کنید" style="color: #cccccc; font-size: 10pt;">

    <input class="btn btn-primary m-2" type="submit" name="submit" value="ایجاد کاربر جدید">


</form>

@include('includes.form_error')

@stop