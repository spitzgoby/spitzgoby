<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    /**
     * GET /admin/posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = \Auth::user()->posts;
        return view('post.index', compact('posts'));
    }

    /**
     * GET /admin/posts/{post}
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * GET /admin/posts/create
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id')->all();
        return view('post.create', compact('tags'));
    }

    /**
     * POST /admin/posts/
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostRequest $request)
    {
        \Auth::user()->posts()->create($request->all());
        return redirect('/admin/posts');
    }


    /**
     * GET /admin/posts/{post}/edit
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $tags = Tag::lists('name', 'id')->all();
        return view('post.edit', compact('post', 'tags'));
    }


    /**
     * PUT admin/posts/{post}
     *
     * @param Post        $post
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());
        // TODO Move resluggify to post update event observer
        $post->resluggify();
        if ($request->has('tag_list')) {
            $post->tags()->sync(Tag::findOrCreateMany($request->get('tag_list')));
        }

        return redirect('/admin/posts');
    }
}
