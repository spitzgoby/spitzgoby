<header>
    <ul class="navigation-list">
        <li class="navigation-item blue {{ active('/') }}">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="navigation-item yellow {{ active('about.*') }}">
            <a href="{{ route('about.index') }}">About</a>
        </li>
        @if(\Auth::check())
            <li class="navigation-item orange {{ active('admin.posts.*') }}">
                <a href="{{ route('admin.posts.index') }}">Posts</a>
            </li>
        @else
            <li class="navigation-item orange {{ active('posts.*') }}">
                <a href="{{ route('posts.index') }}">Posts</a>
            </li>
        @endif
        <li class="navigation-item purple {{ active('code.*') }}">
            <a href="{{ route('code.index') }}">Code</a>
        </li>
        @if(\Auth::check())
            <li class="navigation-item blue">
                <a href="{{ url('admin/logout') }}">Logout</a>
            </li>
        @endif
    </ul>
</header>
