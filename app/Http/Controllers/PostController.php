<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        // $posts = DB::table('posts')->get();

        $posts = Post::all();

        return view('welcome', compact('posts'));
    }

    public function show($id){

        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
}
