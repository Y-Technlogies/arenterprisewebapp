@extends('mainlayouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Welcome, {{Auth::user()->username}}</div>
               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div><a href="/posts/create" class="btn btn-primary">Create Posts</a></div>
                    <br>
                    <h3>Your logged posts</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><span style="display:flex; justify-content:flex-end; width:190%; padding:0;">
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a></span></td>
                            <td>
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::Hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'style'=>'inline-block'])}}
                            {!!Form::close()!!}   
                            </td>
                        </tr>
                        @endforeach   
                    </table>
                    @else
                    <p>You've no post</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
