

@extends('layouts.blog-post')

@section('content')
       <!-- Title -->
          <h1 class="mt-4">{{$post->title}}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">{{$post->user->name}}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{$post->created_at->diffForHumans()}}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src='/codehacking/public/images/{{$post->photo->photo}}' alt= {{$post->photo->photo}}>

          <hr>

          <!-- Post Content -->
          <p class = 'lead'>{{$post->body}}
          <hr>
            @if (Auth::check())
               <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action= {{route('comments.store')}} method='POST'>
                {{csrf_field()}}
                <input type = 'hidden' name = 'post_id' value = {{$post->id}}>
                
                <div class="form-group">
                  <textarea class="form-control" rows="3" name='body'></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>  
            @endif
         
          @if (count($comment)>0)
          @foreach ($comment as $item)
          @if ($item->is_active == 1)

          <div class="media mb-4" >
            
            <img height = '50' class="d-flex mr-3 rounded-circle" src="/codeHacking/public/images/{{$post->user->photo->photo}}" alt="">
            <div class="media-body ">
            
              <h5 class="mt-0">{{$item->author}}</h5>
              {{$item->body}}  
              @if (count($item->commentReplies)>0)
              @foreach ($item->commentReplies as $replies)
              @if ($replies->is_active == 1)
              {{--  <button class = 'btn btn-primary float-right flip'>Reply</button>     --}}
              {{--  work on jquery  --}}
              <div class="media mt-4">
                <img height = '50' class="d-flex mr-3 rounded-circle" src="/codeHacking/public/images/{{$replies->comment->post->user->photo->photo}}" alt="">
                <div class="media-body" id='flip'>
                  <h5 class="mt-0">{{$replies->author}}</h5>
                {{$replies->body}} 
                </div>
              </div>    
              @endif              
              @endforeach    
              @endif

              
              <div class = 'panel'>
              <form action= {{route('replies.store')}} method='POST'>
                {{csrf_field()}}
                <input type = 'hidden' name = 'comment_id' value = {{$item->id}}>
                
                <div class="form-group">
                  <textarea class="form-control" rows="1" name='body'></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
      </div>
         
          @endif

          @endforeach
         
          @endif

@endsection

@section('jquery')
<script src = '"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
  $(document).ready(function(){
  $(".flip").click(function(){
      $(".media mt-4.panel").slideDown("slow");
  });
});
</script>  
@endsection


          
