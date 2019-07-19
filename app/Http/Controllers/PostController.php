<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){

        // $posts = DB::table('posts')->get();

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){

        return view('posts.show', compact('post'));
    }

    public function create(){

        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3'
        ]);
        // https://github.com/cviebrock/eloquent-sluggable
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')->withFlashMessage("Objava je dodana uspješno.");
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|min:3|max:65535'        
        ]);

        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->slug = null;
        $post->save();

        return redirect()->route('posts.index')->withFlashMessage("$post->title uspješno je ažuriran.");
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->withFlashMessage("Post $post->title obrisan je uspješno.");
    }
}
