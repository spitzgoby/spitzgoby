<article>
    @if(\Auth::check())
        <a href="{{ route('admin.posts.show', $post->slug) }}">
    @else
        <a href="{{ route('posts.show', $post->slug) }}">
    @endif
        <h2 class="article-title">{{ $post->title }}</h2>
        {!! $post->summary !!}
    </a>
    @if(\Auth::check() && \Auth::id() == $post->user_id)
        <a class="btn btn-info" href="{{ route('admin.posts.edit', $post->id) }}">
            <i class="fa fa-pencil"></i> Edit
        </a>
    @endif
</article>
