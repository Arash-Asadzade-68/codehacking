@extends('layouts.admin')




@section('content')

    @include('includes.tinyeditor')
    <div class="col-xl-10">
        <h1>ایجاد پست</h1>
        <form class="align-content-center" method="Post" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">عنوان:</label>
                <input class="form-control m-2" type="text" name="title" style="color: #101010; font-size: 10pt;">
            </div>

            <div class="form-group">
                <lable for="category_id">دسته:</lable>
                <select class="form-control m-2" name="category_id" style="color: #101010; font-size: 10pt;">
                    <option value="" selected="selected">انتخاب کنید</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="body">متن پیام :</label>
                <textarea class="form-control m-2" rows="5" id="body" name="body"
                          style="color: #101010; font-size: 10pt;"></textarea>
            </div>

            <div class="form-group">
                <label for="photo_id">تصویر:</label>
                <input class="m-2" type="file" name="photo_id" style="color: #101010; font-size: 10pt;">
            </div>

            <input class="btn btn-outline-success m-2" style="padding-right: 40px; padding-left: 40px;" type="submit"
                   name="submit" value="ارسال">


        </form>
        @include('includes.form_error')
    </div>


@stop