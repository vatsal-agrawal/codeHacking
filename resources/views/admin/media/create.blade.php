@extends('layouts.admin')

@section('css')
   <link rel = 'stylesheet' type = 'text/css' href = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css'/> 
@endsection


@section('content')
    <form action = "/codeHacking/public/admin/media/store" method="POST" enctype="multipart/form-data" class = "dropzone">
   {{csrf_field()}}
    </form>
@endsection


@section('script')
   <script src = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js'/></script> 
@endsection