<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth',['except'=> ['index', 'show']]);
    }
    public function index()
    {
        $posts = Post::getPublishedPosts();
        return view('posts.index', compact(['posts']));
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show', compact(['post']));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), Post::STORE_RULES);

        $post = Post::create(request()->all());
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect()->route('all-posts');
    }
}
