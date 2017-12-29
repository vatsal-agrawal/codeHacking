@extends('layouts.admin')
@section('content')
   <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Post</th>
        <th>Comment</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($comment)
      @foreach($comment as $item)
        <tr>
            <td>{{$item->id}}</td>
           <td>{{$item->author}}</td>
            <td>{{$item->email}}</td>
            <td><a href = '/codeHacking/public/post/{{$item->post->id}}'>{{$item->post->title}}</a></td>
            <td>{{$item->body}}</td>
            <td>{{$item->created_at->diffforhumans()}}</td>
            <td>{{$item->updated_at->diffforhumans()}}</td>
            <td><a href = {{route('replies.show',[$item->id])}}>View Replies</a></td>
            <td>
                @if($item->is_active == 1)
            <form action = "{{route('comments.update',[$item->id])}}" method="POST">
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="is_active" value="0" />
                {{csrf_field()}}
                <button type="submit" class="btn btn-info">UnApprove</button>
            </form>
              @else
            <form action = "{{route('comments.update',[$item->id])}}" method="POST">
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="is_active" value="1" />
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Approve</button>
            </form>
                    
                @endif

            </td>
            <td>
            <form action = "{{route('comments.destroy',[$item->id])}}" method="POST">
                <input type="hidden" name="_method" value="delete" />
                {{csrf_field()}}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>



            </td>

        </tr>
      @endforeach
    @endif
    </tbody>
  </table>   
@endsection
