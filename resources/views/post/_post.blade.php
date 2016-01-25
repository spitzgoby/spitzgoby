<article>
    <a href="{{ route('posts.show', $article->slug) }}">
        <h2 class="article-title">{{ $article->title }}</h2>
        <p class="article-summary">{{ $article->summary }}</p>
    </a>
</article>
