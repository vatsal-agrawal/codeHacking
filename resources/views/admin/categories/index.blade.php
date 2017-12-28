@extends('layouts.admin')
@section('content')

<div class = 'col-sm-6'>

 <form action = "/codeHacking/public/admin/categories" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

  @include('includes.formerror')
  
    <div class="form-group">
    <label for="pwd">Category Name:</label>
    <input class="form-control" id="pwd" name = "name" />
  </div>

   <button type="submit" class="btn btn-primary col-sm-6">Create</button>
 
 
</form>
</div>

<div class = 'col-sm-6'>

<h1>Categories</h1>
     <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
    @if($category)
      @foreach($category as $item)
        <tr>

            <td>{{$item->id}}</td>
            <td><a href = {{route('categories.edit',[$item->id])}}>{{$item->name}}</td>
            <td>{{$item->created_at->diffforhumans()}}</td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>   

</div>




    
@endsection