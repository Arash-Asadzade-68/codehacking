@extends('layouts.admin')



@section('content')


    <div class="col-xl-10">
    <table class="table table-responsive-md table-hover" style="border-radius: 4px;">
        <thead style="background-color: #ddd">
        <tr>
            <th>ردیف</th>
            <th>نام و نام خانوادگی</th>
            <th> عکس</th>
            <th>ایمیل</th>
            <th>سطح دسترسی</th>
            <th>وضعیت</th>
            <th>ویرایش</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td><img class="img-fluid rounded-circle" style="width: 50px; height: 50px;"
                             src="{{$user->photo ? $user->photo->path : '/images/1.png'}}" alt="فاقد عکس"></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? "فعال" : "غیر فعال"}}</td>
                    <td><a style="line-height: 27px; padding-right: 13pt; font-size: 16pt; color: black; opacity: .7; " class="fa fa-edit " href="{{route('users.edit',$user->id)}}"></a></td>
                </tr>

            @endforeach
        </tbody>
        @endif
    </table>

    </div>




@stop
