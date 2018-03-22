@extends('layouts.admin')




@section('content')


    <div class="col-xl-10">
        <h1>ویرایش دسته</h1>
        <form class="align-content-center" method="Post" action="/admin/categories/{{$category->id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">عنوان دسته:</label>
                <input class="form-control m-2" type="text" name="name" value="{{$category->name}}" style="color: #101010; font-size: 10pt;">
            </div>
            <input class="btn btn-outline-success m-2 col-sm-6 " style="padding-right: 40px; padding-left: 40px;" type="submit" name="submit" value="ویرایش">


        </form>
        <form class="align-content-center" method="Post" action="/admin/categories/{{$category->id}}" >
            @csrf
            @method('DELETE')
            <input class="btn btn-outline-danger m-2  col-sm-6" style="padding-right: 40px; padding-left: 40px;" type="submit" name="submit" value="حذف">


        </form>


        @include('includes.form_error')
    </div>



@stop