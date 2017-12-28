

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
          <div class="media mb-4">
            <img height = '50' class="d-flex mr-3 rounded-circle" src="/codeHacking/public/images/{{$post->user->photo->photo}}" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$item->author}}</h5>
              {{$item->body}}  
            </div>
          </div> 
          @endif
         
          @endforeach
         
          @endif

         

          <!-- Comment with nested comments -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div>
    
@endsection
          
