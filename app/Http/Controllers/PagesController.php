<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){
        $post = new Post();
        return view('pages.index')->with('posts', $post::paginate(5));
    }
    public function displaySingle($id){
        $post = new Post();
        return view('pages.single')->with('post', $post::findOrFail($id));
    }   
}
