@extends('layouts.sidebar')

@section('content')

   <div id="app">
        <video-player
            file="https://www.youtube.com/watch?v=ZTLAx3VDX7g"
            title="Star Wars Acapella"
            description="Jimmy Fallon and the cast of The Force Awakens sing the
                        theme songs from Star Wars"
        >
            <div id="video"><i class="fa fa-spinner fa-spin"></i> Loading video player...</div>
        </video-player>

   </div>

@stop

@section('script')
    <script src="/js/lib/jwplayer.js"></script>
    <script>jwplayer.key="N9BKmmi9T17VvXMGliiUJKAlBEcW2qk9He72pw==";</script>
    <script>
        Vue.component('video-player', {
            props: ['file', 'title', 'description'],

            ready() {
                var player = jwplayer('video');
                player.setup({
                    file: this.file,
                    width: 600,
                    height: 400,
                    title: this.title,
                    description: this.description
                });
            }
        });

        new Vue({
            el: '#app',
        });
    </script>
@stop