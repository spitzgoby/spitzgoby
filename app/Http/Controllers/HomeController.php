<?php

namespace App\Http\Controllers;

use App\Post;

use App\Http\Requests;

class HomeController extends Controller
{

    /**
     * GET /
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $posts = Post::recent(3)->get();
        return view('home.index', compact('posts'));
    }
}
