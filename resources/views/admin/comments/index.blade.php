@extends('layouts.admin')




@section('content')


    <div class="col-xl-10">
        <h1>همه کامنت ها</h1>
        @if(Session::has('Update_Comment') or Session::has('Delete_Comment'))

            <div class="alert alert-success" style="color: #fff; margin-bottom: 10px;">
                {{session('Update_Comment')}}
            </div>
            <div class="alert alert-danger" style="color: #fff; margin-bottom: 10px;">
                {{session('Delete_Comment')}}
            </div>

        @endif

        @if(count($comments)>0)
        <table class="table table-responsive-md table-hover" style="border-radius: 4px;font-size: 10pt; ">
            <thead style="background-color: #ddd;">
            <tr>
                <th>ردیف</th>
                {{--<th>تصویر</th>--}}
                <th>فرستنده</th>
                <th> ایمیل</th>
                <th>متن</th>
                <th>زمان ایجاد</th>
                <th>مشاهده پست</th>
                <th>مشاهده پاسخها</th>
                <th>تایید/عدم تایید</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody >

                @foreach($comments as $comment)

                    <tr>
                        <td>{{$comment->id}}</td>
                        {{--<td><img class="img-fluid rounded-circle" style="width: 50px; height: 50px;"--}}
                                 {{--src="{{$post->photo ? $post->photo->path : '/images/1.png'}}"--}}
                                 {{--alt="فاقد عکس"></td>--}}
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{str_limit($comment->body,10)}}</td>
                        <td>{{$comment->created_at->diffForhumans()}}</td>
                        <td><a href="{{route('home.post',$comment->post->slug)}}">مشاهده</a></td>
                        <td><a href="{{route('replies.show',$comment->id)}}">مشاهده</a></td>
                        <td>
                            @if($comment->is_active==1)

                                <form class="align-content-center" method="Post" action="/admin/comments/{{$comment->id}}">
                                            @csrf
                                    @method('PATCH')
                                            <input type="hidden" name="is_active" value="0">

                                            <input class="btn btn-success" type="submit"  name="submit" value="عدم تایید">


                                </form>

                                @else

                                <form class="align-content-center" method="Post" action="/admin/comments/{{$comment->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="is_active" value="1">

                                    <input class="btn btn-info" type="submit"  name="submit" value="تایید">


                                </form>

                            @endif
                        </td>
                        <td>

                            <a style="font-size: 12pt; color: red; cursor: pointer" class="fa fa-trash" data-toggle="modal" data-target="#{{$comment->id}}">
                            </a>

                            <!-- The Modal -->
                            <div class="modal fade" id="{{$comment->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title float-right">آیا می خواهید کامنت را حذف کنید؟</h4>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <form class="align-content-center" method="Post" action="/admin/comments/{{$comment->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-info" type="submit"  name="submit" value="بله">
                                                <button type="button"  class="btn btn-danger" data-dismiss="modal">خیر</button>
                                            </form>

                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer" style="direction: rtl">
                                        </div>

                                    </div>
                                </div>
                            </div>



                        </td>

                    </tr>

                @endforeach
            </tbody>

            @else

                <div class="alert alert-primary">

                    کامنتی برای مشاهده وجود ندارد
                    <button type="button" class="close float-left" data-dismiss="alert"  style="font-size: 10pt">&times;</button>
                    <button ></button>
                </div>

            @endif
        </table>


    </div>


@stop