@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>
    <div class = "row">
  <div class="col-sm-3">
    <img src= '/codeHacking/public/images/{{$user->photo?$user->photo->photo:"img.png"}}' height=200 class = 'img-responsive img-circle'/>
  
  </div>
<div class="col-sm-9">
    <form action = "/codeHacking/public/admin/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="put" />
    {{csrf_field()}}

  @include('includes.formerror')
  
  <div class="form-group">
    <label for="pwd">Name:</label>
    <input type="text" class="form-control" id="pwd" name = "name" value= {{$user->name}}>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name = "email" value= {{$user->email}}>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name = "password">
  </div>
  <div class="form-group">
    <label for="role">Role:</label>
    <select class="form-control" id="role" name = "role_id">
    <option value = '1' {{$user->role_id==1?"selected":''}}> Administrator</option>
    <option value = '2' {{$user->role_id==2?"selected":''}}> Subscribser</option>
    </select>
  </div>
  <div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name = "is_active">
    <option value = '1' {{$user->is_active==1?"selected":''}}> Active</option>
    <option value = '0' {{$user->is_active==0?"selected":''}}> Not Active</option>
    </select>
  </div>

  <div class="form-group">
    <label for="pwd"> Select image to upload:</label>
    <input type="file" class="form-control" id="pwd" name = "photo_id">
  </div>

  
  <button type="submit" class="btn btn-primary col-sm-6">Update</button>
 
 
</form>
<form action = "/codeHacking/public/admin/users/{{$user->id}}" method="POST">
    <input type="hidden" name="_method" value="delete" />
    {{csrf_field()}}
    <button type="submit" class="btn btn-danger col-sm-6">Delete</button>
    </form>
 </div>
 </div>
@endsection