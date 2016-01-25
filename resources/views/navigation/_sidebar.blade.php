<header>
    <ul class="navigation-list">
        <li class="navigation-item yellow {{ active('about.*') }}">
            <a href="{{ route('about.index') }}">About</a>
        </li>
        <li class="navigation-item orange {{ active('blog.*') }}">
            <a href="{{ route('posts.index') }}">Posts</a>
        </li>
        <li class="navigation-item purple {{ active('code.*') }}">
            <a href="{{ route('code.index') }}">Code</a>
        </li>
    </ul>
</header>
