@extends('layouts.admin')

@section('content')
    <h1>Display Posts</h1>
     <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>User Name</th>
        <th>Photo</th>
        <th>Category</th>
        <th>Title</th>
        <th>Content</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($post)
      @foreach($post as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href = {{route('posts.edit',[$item->id])}}>{{$item->user->name}}</a></td>
            <td><img height = '50' src = '/codehacking/public/images/{{$item->photo ? $item->photo->photo : "img.png"}}'/></td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->body}}</td>
            <td>{{$item->created_at->diffforhumans()}}</td>
            <td>{{$item->updated_at->diffforhumans()}}</td>
            <td><a href = {{route('comments.show',[$item->id])}}>View Comments</td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>   

@endsection