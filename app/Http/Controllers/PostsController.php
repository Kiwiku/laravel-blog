<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //Check if user is logged in
    }
    public function add(){ //Display form
        return view('posts.create');
    }

    public function store(Request $request){ //Add new post to database
        //Check the form
        $this->validate($request,[
            'title' => 'required|max:191',
            'content' => 'required',
        ]);

        //Create new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/')->with('success', 'Post created succesfully');
    }
}
