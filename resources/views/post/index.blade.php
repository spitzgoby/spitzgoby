@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid">
        <div class="articles">
            @if(isset($posts))
                @foreach($posts as $post)
                    @include('post._post', ['post' => $post])
                @endforeach
            @else
                <article>
                    <h1>I haven't posted any articles yet.</h1>
                    <p>Please check back in soon.</p>
                </article>
            @endif
        </div>
        @if(\Auth::check())
            <a class="btn btn-default" href="{{ route('admin.posts.create') }}"><i class="fa fa-plus"></i> Create Post</a>
        @endif
    </div>
@stop
