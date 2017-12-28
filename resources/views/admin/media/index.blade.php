@extends('layouts.admin')
@section('content')

<h1>Media</h1>
     <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
    @if($photo)
      @foreach($photo as $item)
        <tr>

            <td>{{$item->id}}</td>
            <td><img height = '50' src ='/codehacking/public/images/{{$item->photo}}' ></td>
            <td>{{$item->created_at->diffforhumans()}}</td>
            <td>
            <form action = "/codeHacking/public/admin/media/{{$item->id}}" method="POST">
              <input type="hidden" name="_method" value="delete" />
                {{csrf_field()}}
                 <button type="submit" class="btn btn-danger col-sm-3">Delete</button>
            </form>
            </td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table> 
    
@endsection