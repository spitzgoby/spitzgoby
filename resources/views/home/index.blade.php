@extends('layouts.sidebar')

@section('content')

    <div id="app" class="container-fluid">
        <div class="blog">
            <h1 class="header header-orange">Recent Blog Posts</h1>
            <ul class="list-unstyled articles">
                <li>
                    <article>
                        <h2 class="article-title">DST and the iOS SDK (Coming Soon)</h2>
                        <p class="article-description">
                            Daylight Saving Time (DST) is one of the trickier
                            problems to face when building applications that rely
                            heavily on dates and times. So how do iOS frameworks
                            deal with it?
                        </p>
                    </article>
                </li>
                <li class="article">
                    <article>
                        <h2 class="article-title">
                            Building a video player with JWPlayer and the
                            YouTube API (Coming Soon)
                        </h2>
                        <p class="article-description">
                            This lesson will guide you through the process of
                            using the JWPlayer video plugin and Google's
                            YouTube API to create a simple video search tool.
                        </p>
                    </article>
                </li>
            </ul>
        </div>
        <div class="spacer"></div>
        <div class="code">
            <h1 class="header header-orange">Recent Code Updates</h1>
            <ul class="list-unstyled project-updates">
                <li class="project-update">
                    <img src="https://placehold.it/150x150" alt="Tunits Logo" class="project-icon">
                    <h3 class="project-title">Tunits</h3>
                    <p class="project-update-description">
                        Added <code>Array&lt;NSDate&gt;</code> extension
                        methods for all <code>Tunits</code> functionality.
                    </p>
                </li>
                <li class="project-update">
                    <img src="https://placehold.it/150x150" alt="Tunits Logo" class="project-icon">
                    <h3 class="project-title">EvCal</h3>
                    <p class="project-update-description">
                        Added dragging behavior to calendar events that
                        allows events to have their start and end times
                        changed.
                    </p>
                </li>
            </ul>
        </div>
    </div>
@stop