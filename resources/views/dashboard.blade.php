@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <a class="btn btn-default" href="{{route('add')}}">{{ __('Create post') }}</a>
                <h1 class='bg-light'>Your posts</h1>
                @if(count($post) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($post as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td><a href="/edit/{{$item->post_id}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $item->post_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
