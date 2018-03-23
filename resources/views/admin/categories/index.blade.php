@extends('layouts.admin')



@section('content')

    <div class="col-xl-4">

        <form class="align-content-center" method="Post" action="/admin/categories">
            @csrf
            <label for="name">عنوان دسته:</label>
            <input class="form-control m-2" type="text" name="name">
            <input class="btn btn-outline-success m-2" type="submit" name="submit" value="ایجاد دسته">

        </form>


        @include('includes.form_error')


    </div>
    <div class="col-xl-6">

        @if(Session::has('Update_Category') or Session::has('Delete_Category'))

            <div class="bg-success" style="color: #fff; margin-bottom: 10px;">
                {{session('Update_Category')}}
            </div>
            <div class="bg-danger" style="color: #fff; margin-bottom: 10px;">
                {{session('Delete_Category')}}
            </div>

        @endif


        <table class="table table-responsive-md table-hover" style="border-radius: 4px; font-size: 12pt">
            <thead style="background-color: #ddd; font-size: 10pt">
            <tr>
                <th>ردیف</th>
                <th> عنوان</th>
                <th>زمان ایجاد</th>
                <th>زمان ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a style="color: green" href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach
            </tbody>
            @endif
        </table>
             {{$categories->render()}}

    </div>



@stop
