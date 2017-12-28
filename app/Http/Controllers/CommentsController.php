<?php

namespace App\Http\Controllers;

use App\Mail\CommentReceived;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::find($postId);

        $this->validate(request(), Comment::STORE_RULES);

        $post->comments()->create(request()->all());

        Mail::to($post->user)->send(new CommentReceived($post));

        return redirect()->route('single-post', ['id' => $postId]);
    }
}
