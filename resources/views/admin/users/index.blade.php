@extends('layouts.admin')
@section('content')
<p class = 'bg-danger'>{{session('deleteuser')}}</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($user)
      @foreach($user as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><img src= '/codeHacking/public/images/{{$item->photo?$item->photo->photo:"img.png"}}' height= 100 width = 100/></td>
            <td><a href = '/codeHacking/public/admin/users/{{$item->id}}/edit'>{{$item->name}}</a></td>
            <td>{{$item->email}}</td>
            <td>{{$item->role->name}}</td>
            <td>{{$item->is_active ==1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$item->created_at->diffforhumans()}}</td>
            <td>{{$item->updated_at->diffforhumans()}}</td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>   
@endsection

