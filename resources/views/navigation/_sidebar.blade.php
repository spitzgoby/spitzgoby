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
        <li class="navigation-item">
            <a class="social-icon angellist" href="https://angel.co/tom-leu" target="_blank"><i class="fa fa-angellist"></i></a>
            <a class="social-icon linkedin" href="https://linkedin.com/in/spitzgoby" target="_blank"><i class="fa fa-linkedin-square"></i></a>
            <a class="social-icon twitter" href="https://twitter.com/sptizgoby" target="_blank"><i class="fa fa-twitter-square"></i></a>
            <a class="social-icon github" href="https://github.com/spitzgoby" target="_blank"><i class="fa fa-github-square"></i></a>
        </li>
    </ul>
</header>
