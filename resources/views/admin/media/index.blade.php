@extends('layouts.admin')




@section('content')


    <div class="col-xl-10">
        <h1>همه تصاویر</h1>
        @if(Session::has('Update_Post') or Session::has('Delete_Post'))

            <div class="bg-success" style="color: #fff; margin-bottom: 10px;">
                {{session('Update_Post')}}
            </div>
            <div class="bg-danger" style="color: #fff; margin-bottom: 10px;">
                {{session('Delete_Post')}}
            </div>

        @endif


        <form class="align-content-center form-inline" method="Post" action="delete/media">
            @csrf
            @method('DELETE')
            <select name="checkboxArray">
                <option value="">حذف همه</option>
            </select>

            <input class="btn btn-primary m-2" type="submit" name="submit" value="حذف">


            <table class="table table-responsive-md table-hover" style="border-radius: 4px;font-size: 10pt; ">
                <thead style="background-color: #ddd;">


                <tr>
                    <th><input class="checkbox" type="checkbox" id="options"></th>
                    <th>ردیف</th>
                    <th> تصویر</th>
                    <th>زمان ایجاد</th>
                    <th> زمان ویرایش</th>
                    <th> حذف</th>
                </tr>
                </thead>
                <tbody>
                @if($photos)
                    @foreach($photos as $photo)

                        <tr>
                            <td><input class="checkbox checkboxes" type="checkbox" name="checkboxArray[]"
                                       value="{{$photo->id}}"></td>
                            <td>{{$photo->id}}</td>
                            <td><img class="img-fluid rounded-circle" style="width: 50px; height: 50px;"
                                     src="{{$photo->path ? $photo->path : '1.png'}}"></td>
                            <td>{{$photo->created_at->diffForhumans()}}</td>
                            <td>{{$photo->updated_at->diffForhumans()}}</td>
                            <td>

                                <form class="align-content-center" method="POST" action="/admin/media/{{$photo->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <input style="padding-right: 40px; padding-left: 40px;" type="submit" name="submit"
                                           value="حذف" class="btn btn-outline-danger">
                                </form>
                            </td>

                        </tr>

                    @endforeach
                </tbody>
                @endif
            </table>
        </form>

        {{$photos->render()}}
    </div>


@stop

@section('scripts')


    <script>

    $(document).ready(function(){

         $('#options').click(function () {





             if (this.checked) {

                 $('.checkboxes').each(function () {
                     this.checked = true;

                 });

             } else {

                 $('.checkboxes').each(function () {
                     this.checked = false;
                 });
             }


             })

        });

    </script>
@stop