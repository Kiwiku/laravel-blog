  
@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->content!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/edit/{{$post->post_id}}" class="btn btn-primary">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->post_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection