@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <h2>{{ $post->content }}</h2>
    <h5>Created at: {{$post->created_at}}</h5>
</div>
@endsection
