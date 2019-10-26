@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recent posts</h1>
    <div class="row">
        <div class='col-sm-12'>
            @foreach ($posts as $post)
            <div class='col-sm-6'>
                <h2>{{$post->title}}</h2>
                <a class="nav-link" href="{{route('single') . '/' . $post->post_id}}">{{ __('Read more...') }}</a>
            </div>
            @endforeach
            <br><br>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
