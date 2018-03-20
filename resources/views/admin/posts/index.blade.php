@extends('layouts.admin')




@section('content')


    <div class="col-xl-10">
        <h1>همه پست ها</h1>
        @if(Session::has('Update_User') or Session::has('Delete_User'))

            <div class="bg-success" style="color: #fff; margin-bottom: 10px;">
                {{session('Update_User')}}
            </div>
            <div class="bg-danger" style="color: #fff; margin-bottom: 10px;">
                {{session('Delete_User')}}
            </div>

        @endif


        <table class="table table-responsive-md table-hover" style="border-radius: 4px;">
            <thead style="background-color: #ddd">
            <tr>
                <th>ردیف</th>
                <th>تصویر</th>
                <th>فرستنده</th>
                <th> عنوان</th>
                <th>متن</th>
                <th>زمان ایجاد</th>
                <th> زمان ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)

                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img class="img-fluid rounded-circle" style="width: 50px; height: 50px;"
                                 src="{{$post->photo ? $post->photo->path : '/images/1.png'}}"
                                 alt="فاقد عکس"></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForhumans()}}</td>
                        <td>{{$post->updated_at->diffForhumans()}}</td>

                    </tr>

                @endforeach
            </tbody>
            @endif
        </table>


    </div>


@stop