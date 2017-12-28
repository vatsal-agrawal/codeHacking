@if(count($errors)>0)
    <ul class = 'alert alert-danger'>
    @foreach($errors->all() as $item)
        <li> {{$item}}</li>
    @endforeach
    </ul>
    
@endif