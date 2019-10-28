@extends('layouts.app')

@section('content')
<div class="container">
    @if (isset($post))
        <h1>{{ $post->title }}</h1>
        <div class='row'>
            <div class='col-sm-9'>
                {!! $post->content !!}
            </div>
            <div class='col-sm-3 float-right'>
                <h6>Created at: {{$post->created_at}}</h6>
            </div>
        </div>
    @endif
    
</div>
@endsection
