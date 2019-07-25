<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){

        $viewed = session()->get('viewed_posts', []);

        if (!in_array($post->id, $viewed)) {
            session()->push('viewed_posts', $post->id);
            $post->increment('views');
            $post->save();
        }

        return view('posts.show', compact('post'));
    }

    public function create(){

        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:3|max:255',
            'body'  => 'required|min:3',
            'tags'  => 'required'
        ]);

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        $tags = request('tags');
        $post->tags()->attach($tags);

        return redirect()->route('posts.index')->withFlashMessage("Objava je dodana uspješno.");
    }
    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'tags'));
    }
    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|min:3|max:65535',
            'tags'  => 'required'     
        ]);

        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->slug = null;
        $post->save();

        $post->tags()->sync($request['tags']);

        return redirect()->route('posts.index')->withFlashMessage("Objava \"$post->title\" uspješno je ažurirana.");
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

      //  \Mail::to($post->user)->send(new PostDeleted($post));


        return redirect()->route('posts.index')->withFlashMessage("Post $post->title obrisan je uspješno.");
    }
}
