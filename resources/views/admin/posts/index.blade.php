@extends('layouts.admin')




@section('content')


    <div class="col-xl-10">
        <h1>همه پست ها</h1>
        @if(Session::has('Update_Post') )

            <div class="alert alert-success" style="color: #fff; margin-bottom: 10px;">
                {{session('Update_Post')}}
                <button type="button" class="close float-left" data-dismiss="alert" style="font-size: 10pt;">
                    &times;
                </button>
            </div>

        @endif
        @if(Session::has('Delete_Post'))
            <div class="alert alert-danger" style="color: #fff; margin-bottom: 10px;">
                {{session('Delete_Post')}}
                <button type="button" class="close float-left" data-dismiss="alert" style="font-size: 10pt;">
                    &times;
                </button>
            </div>
        @endif


        <table class="table table-responsive-md table-hover" style="border-radius: 4px;font-size: 10pt; ">
            <thead style="background-color: #ddd;">
            <tr>
                <th>ردیف</th>
                <th>تصویر</th>
                <th>فرستنده</th>
                <th> عنوان</th>
                <th>دسته</th>
                <th>متن</th>
                <th>کامنت ها</th>
                <th>زمان ایجاد</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody >
            @if($posts)
                @foreach($posts as $post)

                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img class="img-fluid rounded-circle" style="width: 50px; height: 50px;"
                                 src="{{$post->photo ? $post->photo->path : '/images/1.png'}}"
                                 alt="فاقد عکس"></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category ? $post->category->name : 'فاقد دسته'}}</td>
                        <td>{{str_limit($post->body,10)}}</td>
                        <td>
                            <a style="display: block;  color: green" href="{{route('home.post',$post->slug)}}"> ایجاد کامنت </a>
                            <a style="display: block;  color: green" href="{{route('comments.show',$post->id)}}"> مشاهده کامنت </a>
                        </td>
                        <td>{{$post->created_at->diffForhumans()}}</td>
                        <td>
                            <a style="line-height: 27px; padding-right: 13pt; font-size: 16pt; color: green; opacity: .7; "
                               class="fa fa-edit " href="{{route('posts.edit',$post->id)}}"></a></td>
                        <td>
                            <a style="line-height: 27px; padding-right: 13pt; font-size: 16pt; color: red; opacity: .7; "
                               class="fa fa-trash " href="{{route('posts.destroy',$post->id)}}"></a>
                        </td>

                    </tr>

                @endforeach
            </tbody>
            @endif
        </table>


    </div>


@stop