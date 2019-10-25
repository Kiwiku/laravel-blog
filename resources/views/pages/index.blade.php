@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to my blog!</h1>
    @foreach ($posts as $post)
        {{$post}}
    @endforeach
</div>
@endsection
