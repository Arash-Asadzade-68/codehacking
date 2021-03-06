@extends('layouts.admin')




@section('content')


    <div class="col-xl-10">
        <h1>همه کامنت ها</h1>
        @if(Session::has('Update_Reply') or Session::has('Delete_Reply'))

            <div class="alert alert-success" style="color: #fff; margin-bottom: 10px;">
                {{session('Update_Reply')}}
            </div>
            <div class="alert alert-danger" style="color: #fff; margin-bottom: 10px;">
                {{session('Delete_Reply')}}
            </div>

        @endif

        @if(count($replies)>0)
            <table class="table table-responsive-md table-hover" style="border-radius: 4px;font-size: 10pt; ">
                <thead style="background-color: #ddd;">
                <tr>
                    <th>ردیف</th>
                    <th>تصویر</th>
                    <th>فرستنده</th>
                    <th> ایمیل</th>
                    <th>متن</th>
                    <th>زمان ایجاد</th>
                    <th>مشاهده پست</th>
                    <th>تایید/عدم تایید</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody >

                @foreach($replies as $reply)

                    <tr>
                        <td>{{$reply->id}}</td>
                        <td><img class="img-fluid rounded-circle" style="width: 50px; height: 50px;"
                                 src="{{$reply->photo ? $reply->photo : '/images/1.png'}}"
                                 alt="فاقد عکس"></td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{str_limit($reply->body,10)}}</td>
                        <td>{{$reply->created_at->diffForhumans()}}</td>
                        <td><a href="{{route('home.post',$reply->comment->post->slug)}}">مشاهده</a></td>
                        <td>
                            @if($reply->is_active==1)

                                <form class="align-content-center" method="Post" action="/admin/comment/replies/{{$reply->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="is_active" value="0">

                                    <input class="btn btn-success" type="submit"  name="submit" value="عدم تایید">


                                </form>

                            @else

                                <form class="align-content-center" method="Post" action="/admin/comment/replies/{{$reply->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="is_active" value="1">

                                    <input class="btn btn-info" type="submit"  name="submit" value="تایید">


                                </form>

                            @endif
                        </td>
                        <td>

                            <a style="font-size: 12pt; color: red; cursor: pointer" class="fa fa-trash" data-toggle="modal" data-target="#{{$reply->id}}">
                            </a>

                            <!-- The Modal -->
                            <div class="modal fade" id="{{$reply->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title float-right">آیا می خواهید کامنت را حذف کنید؟</h4>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <form class="align-content-center" method="Post" action="/admin/comment/replies/{{$reply->id}}">
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

                        پاسخی برای کامنت وجود ندارد
                        <button type="button" class="close float-left" data-dismiss="alert"  style="font-size: 10pt">&times;</button>
                        <button ></button>
                    </div>

                @endif
            </table>


    </div>


@stop