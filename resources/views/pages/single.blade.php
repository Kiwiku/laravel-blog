@extends('layouts.app')

@section('content')
<div class="container">
    @if (isset($post))
        <h1>{{ $post->title }}</h1>
        {!! $post->content !!}
        <h5>Created at: {{$post->created_at}}</h5>
    @endif
    
</div>
@endsection
