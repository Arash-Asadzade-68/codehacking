@extends('layouts.admin')


@section('styles')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" rel="stylesheet">
@stop



@section('content')
    <div class="col-xl-10">

        <form class="align-content-center dropzone" method="Post" action="/admin/media">
            @csrf

        </form>

    </div>
@stop



@section('scripts')

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@stop