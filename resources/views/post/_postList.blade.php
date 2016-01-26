<ul class="list-unstyled articles">
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <li>@include('post._post', $post)</li>
        @endforeach
    @else
        <li><p>No posts yet, check back soon.</p></li>
    @endif
</ul>
