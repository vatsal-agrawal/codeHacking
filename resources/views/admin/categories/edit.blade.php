@extends('layouts.admin')
@section('content')

<div class="col-sm-6">
    <form action = "/codeHacking/public/admin/categories/{{$category->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="put" />
    {{csrf_field()}}

  @include('includes.formerror')
  
    <div class="form-group">
    <label for="pwd">Category Name:</label>
    <input class="form-control" id="pwd" name = "name" value = {{$category->name}}>
  </div>

   <button type="submit" class="btn btn-primary col-sm-3">Update</button>
   </form>
<form action = "/codeHacking/public/admin/categories/{{$category->id}}" method="POST">
    <input type="hidden" name="_method" value="delete" />
    {{csrf_field()}}
    <button type="submit" class="btn btn-danger col-sm-3">Delete</button>
    </form>
 </div>
    
@endsection