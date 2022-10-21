<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('show', compact('post'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->summary = $request->input('summary');
        $post->content = $request->input('content');

        $image_path = $request->file('cover')->store('public/covers');
        $image_url = config('app.url') . '/' . str_replace('public/covers', 'storage/covers', $image_path);
        $post->image = $image_url;

        $post->save();

        return redirect()->route('home');
    }

    public function createComment(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->save();

        return redirect()->back();
    }
}
