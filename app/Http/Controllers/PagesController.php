<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){
        $post = new Post();
        return view('pages.index')->with('posts', $post::all());
    }   
}
