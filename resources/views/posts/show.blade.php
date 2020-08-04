@extends('layouts.app')

@section('content')
    <div><a href="/posts" class="btn btn-primary" type="button" >Go Back</a></div>
    <br>
    <h1>{{$post->title}}</h1>
    <img style="width:30%" src="/storage/cover_images/{{$post->cover_image}}"> 
    <br><br>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>written on ABC{{$post->created_at}} by {{$post->title}}</small>  
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a>        
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::Hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    <br>
    <br>
    <br>
    <br> 
@endsection