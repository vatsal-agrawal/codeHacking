@extends('layouts.admin')
@section('content')
    <h1>Create Post</h1>
    <form action = "/codeHacking/public/admin/posts" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

  @include('includes.formerror')
 
  <div class="form-group">
    <label for="pwd">Title:</label>
    <input type="text" class="form-control" id="pwd" name = "title">
  </div>
  <div class="form-group">
    <label for="role">Category:</label>
    <select class="form-control" id="role" name = "category_id">
    @foreach($category as $item)
            <option value = {{$item->id}} {{$item->id == 1?'selected': ''}}>{{$item->name}}</option>
    @endforeach


    </select>
  </div>
   <div class="form-group">
    <label for="pwd"> Select image to upload:</label>
    <input type="file" class="form-control" id="pwd" name = "photo_id">
  </div>
 <div class="form-group">
    <label for="pwd">Description:</label>
    <textarea class="form-control" id="pwd" name = "body" rows = '5'></textarea>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>

@endsection