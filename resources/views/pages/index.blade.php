@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recent posts</h1>
    <div class="row">
        <div class='col-sm-12'>
        @if (count($posts) > 0) <!-- check if there are any posts in the query -->
            @foreach ($posts as $post)
            <div class='col-sm-6'>
                <h2>{{$post->title}}</h2>
                <a class="nav-link" href="{{route('single') . '/' . $post->post_id}}">{{ __('Read more...') }}</a>
            </div>
            @endforeach
            <br><br>
            {{ $posts->links() }}
        @else
            <h2>No posts!</h2>
        @endif
        </div>
    </div>
</div>
@endsection
