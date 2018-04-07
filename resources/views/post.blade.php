@extends('layouts.blog-post')




@section('content')


    <!-- Title -->
    <h1 class="mt-4">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        ارسال شده توسط
        <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>تاریخ ارسال پست {{$post->created_at}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{$post->photo->path}}" alt="">

    <hr>
    <div class="row">
        <div class="col-md-12 post">

            <!-- Post Content -->
            <p class="lead " >{!! $post->body !!}</p>

        </div>


    </div>

    <hr>



    <!-- Comments Form -->

    @include('includes.form_error')
    @if(Auth::check())
        <div class="card my-4">
            <h5 class="card-header">ایجاد کامنت:</h5>
            <div class="card-body">
                @if(Session::has('Comment'))

                    <div class="alert alert-primary">
                        <button type="button" class="close float-left" data-dismiss="alert" style="font-size: 10pt">
                            &times;
                        </button>
                        {{session('Comment')}}
                    </div>
                @endif

                <form class="align-content-center" method="Post" action="/admin/comments">
                    @csrf

                    <div class="form-qroup">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <textarea class="form-control m-2" type="text" name="body" rows="3"></textarea>

                        <button type="submit" class="btn btn-outline-info">ارسال</button>
                    </div>

                </form>

            </div>
        </div>
    @endif

    <!-- Single Comment -->

    @if(count($comments)>0)
        @foreach($comments as $comment)
            <div class="media mb-4">
                <img height="50" width="50" class="d-flex mr-3 rounded-circle" src="{{$comment->photo}}" alt="">
                <div class="media-body">
                    <span class="mt-0" style="font-size: 13pt">
                        {{$comment->author}}
                        <span style="font-size: 10pt; padding-right: 5px">{{$comment->created_at->diffForHumans()}}</span>
                    </span>

                    <p style="font-size: 10pt" class="p-1">{{$comment->body}}
                        <span id="#{{$comment->id}}" onclick="showReplies(this,{{$comment->id}})"
                              class="fa fa-reply float-left" style="font-size: 16px; cursor: pointer"></span></p>


                    <div class="respond">

                        @if(count ($comment->replies)>0)

                            @foreach($comment->replies as $reply)

                                @if($reply->is_active==1)

                                    <div class="media mt-4">
                                        <img height="50" width="50" class="d-flex mr-3 rounded-circle"
                                             src="{{$reply->photo}}" alt="">
                                        <div class="media-body">
                                    <span class="mt-0" style="font-size: 13pt">{{$reply->author}}
                                        <span style="font-size: 10pt; padding-right: 5px">{{$reply->created_at->diffForHumans()}}</span>
                                    </span>
                                            <p style="font-size: 10pt" class="p-1">{{$reply->body}}</p>

                                        </div>


                                    </div>

                                @endif
                            @endforeach


                        @endif

                        <form class="align-content-center" method="Post" action="/comment/reply">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <label for="body"></label>
                            <textarea class="form-control m-2 col-sm-6" type="text" name="body" rows="1"></textarea>

                            <input class="btn btn-primary m-2" type="submit" name="submit" value="ارسال">


                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


@stop

@section('right_content')

    <h5 class="card-header">دسته ها</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                @if($categories)
                    @foreach($categories as $category)
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#">{{$category->name}}</a>
                            </li>
                        </ul>
                    @endforeach
            </div>
            @endif
        </div>
    </div>





@stop