@extends('layouts.admin')
@section('content')
   <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if(count($commentReplies)>0)
      @foreach($commentReplies as $item)
        <tr>
            <td>{{$item->id}}</td>
           <td>{{$item->author}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->comment->body}}</td>
            <td>{{$item->body}}</td>
            <td>{{$item->created_at->diffforhumans()}}</td>
            <td>{{$item->updated_at->diffforhumans()}}</td>
            <td>
                @if($item->is_active == 1)
            <form action = "{{route('replies.update',[$item->id])}}" method="POST">
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="is_active" value="0" />
                {{csrf_field()}}
                <button type="submit" class="btn btn-info">UnApprove</button>
            </form>
              @else
            <form action = "{{route('replies.update',[$item->id])}}" method="POST">
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="is_active" value="1" />
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Approve</button>
            </form>
                    
                @endif

            </td>
            <td>
            <form action = "{{route('replies.destroy',[$item->id])}}" method="POST">
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