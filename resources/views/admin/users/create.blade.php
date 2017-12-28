@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>
    <form action = "/codeHacking/public/admin/users" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

  @include('includes.formerror')
 
  <div class="form-group">
    <label for="pwd">Name:</label>
    <input type="text" class="form-control" id="pwd" name = "name">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name = "email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name = "password">
  </div>
  <div class="form-group">
    <label for="role">Role:</label>
    <select class="form-control" id="role" name = "role_id">
    <option value = '1' selected> Administrator</option>
    <option value = '2'> Subscriber</option>
    </select>
  </div>
  <div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name = "is_active">
    <option value = '1' selected> Active</option>
    <option value = '0'> Not Active</option>
    </select>
  </div>

   <div class="form-group">
    <label for="pwd"> Select image to upload:</label>
    <input type="file" class="form-control" id="pwd" name = "photo_id">
  </div>

  
  <button type="submit" class="btn btn-default">Submit</button>
</form>

@endsection