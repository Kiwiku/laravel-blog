@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recent posts</h1>
    <div class="row">
        <div class='col-sm-12'>
            @foreach ($posts as $post)
            <div class='col-sm-6'>
                <h2>{{$post->title}}</h2>
            </div>
            @endforeach
            <br><br>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
