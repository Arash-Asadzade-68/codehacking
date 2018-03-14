@extends('layouts.admin')



@section('content')



    <table class="table table-responsive-sm table-hover" style="border-radius: 4px;">
        <thead  style="background-color: #ddd" >
        <tr>
            <th>ردیف</th>
            <th>نام و نام خانوادگی</th>
            <th>ایمیل</th>
            <th>سطح دسترسی</th>
            <th>وضعیت </th>
        </tr>
        </thead>
        <tbody>
        @if($users)
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? "فعال" : "غیر فعال"}}</td>
        </tr>
            @endforeach
        </tbody>
        @endif
    </table>






    @stop
