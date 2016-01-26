@extends('layouts.sidebar')

@section('content')

    <div id="app" class="container-fluid">
        <div class="blog">
            <h1 class="header header-orange">Recent Blog Posts</h1>
            @include('post._postList')
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

@section('script')
    @include('_highlight')
@stop