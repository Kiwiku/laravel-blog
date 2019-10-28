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

    public function displaySingle($id){
        $post = new Post();
        return view('posts.single')->with('post', $post::findOrFail($id));
    }   

    public function add(){ //Display form
        return view('posts.create');
    }

    public function store(Request $request){ //Add new post to database
        //Check the form
        $this->validate($request,[
            'title' => 'required|max:191',
            'content' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);
        
        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get filename
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/')->with('success', 'Post created succesfully');
    }

    public function destroy($id){ //Delete the post
        $single = Post::find($id); //Find the post;
        $post = Post::orderBy('created_at','desc')->paginate(6);
        if(!isset($single)){
            
            return view('pages.index', ['error' => 'No post found', 'posts' => $post]);
        }
        if(auth()->user()->id !== $single->user_id){
            return view('pages.index', ['error' => 'Unauthorized page', 'posts' => $post]);
        }

        $single->delete();
        return view('pages.index', ['success' => 'Post removed', 'posts' => $post]);
    }
    public function edit($id){
        $single = Post::find($id); //Find the post;
        $post = Post::orderBy('created_at','desc')->paginate(6);
        if(!isset($single)){
            
            return view('pages.index', ['error' => 'No post found', 'posts' => $post]);
        }
        if(auth()->user()->id !== $single->user_id){
            return view('pages.index', ['error' => 'Unauthorized page', 'posts' => $post]);
        }

        return view('posts.edit')->with('post', $single);

    }
    
    public function update(Request $request, $id){
        $posts = Post::orderBy('created_at','desc')->paginate(6);

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        $array = ['success' => 'Post edited successfully', 'posts' => $posts];
        return  redirect('/')->with($array);
    }
}
