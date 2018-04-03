
@if(count($errors)>0)
    <div class="alert alert-danger">
   <ul>
    @foreach($errors->all() as $error)

        <li >{{$error}}

            <button type="button" class="close float-left" data-dismiss="alert" style="font-size: 10pt;">
                &times;
            </button>

        </li>

    @endforeach

   </ul>
    </div>
@endif