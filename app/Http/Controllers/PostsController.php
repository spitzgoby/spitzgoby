<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;

class PostsController extends Controller
{

    /**
     * GET /posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::published()->get();
        return view('post.index', compact('posts'));
    }

    /**
     * GET /posts/{posts}
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
