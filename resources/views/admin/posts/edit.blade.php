@extends('layouts.admin')
@section('content')
    <h1>Edit Post</h1>
    <div class = "row">
  <div class="col-sm-3">
    <img src= '/codeHacking/public/images/{{$post->photo?$post->photo->photo:"img.png"}}' height=200 class = 'img-responsive img-circle'/>
  
  </div>
<div class="col-sm-9">
    <form action = "/codeHacking/public/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="put" />
    {{csrf_field()}}

  @include('includes.formerror')
  
    <div class="form-group">
    <label for="pwd">Title:</label>
    <textarea class="form-control" id="pwd" name = "title" rows = '1'>{{$post->title}}</textarea>
  </div>
 
  <div class="form-group">
    <label for="status">Category:</label>
    <select class="form-control" id="status" name = "category_id">
     @foreach($category as $item)
            <option value = {{$item->id}} {{$item->id == $post->category_id?'selected': ''}}>{{$item->name}}</option>
    @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="pwd"> Select image to upload:</label>
    <input type="file" class="form-control" id="pwd" name = "photo_id">
  </div>

  <div class="form-group">
    <label for="pwd">Description:</label>
    <textarea class="form-control" id="pwd" name = "body" rows = '5'>{{$post->body}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary col-sm-6">Update</button>
 
 
</form>
<form action = "/codeHacking/public/admin/posts/{{$post->id}}" method="POST">
    <input type="hidden" name="_method" value="delete" />
    {{csrf_field()}}
    <button type="submit" class="btn btn-danger col-sm-6">Delete</button>
    </form>
 </div>
 </div>
@endsection