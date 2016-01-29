@extends('layouts.sidebar')

@section('content')

   <div id="app">
       <video-player
           :url.sync="url"
           title="Star Wars Acapella"
           description="Jimmy Fallon and the cast of The Force Awakens sing the
                    theme songs from Star Wars"
       ></video-player>

       <video-search
           :url.sync="url"
           :query.sync="query"
       ></video-search>


       <template id="video-player-template">
           <div id="video"><i class="fa fa-spinner fa-spin"></i> Loading video player...</div>
       </template>

       <template id="video-search-template">
           <h3>Search</h3>
           <div class="input-group">
              <input type="text" v-model="query" class="form-control" placeholder="Search Youtube...">
              <span class="input-group-btn">
                  <button class="btn btn-default" @click="search">Search</button>
              </span>
           </div>
       </template>
   </div>

@stop

@section('script')
    <script src="/js/lib/jwplayer.js"></script>
    <script>jwplayer.key="N9BKmmi9T17VvXMGliiUJKAlBEcW2qk9He72pw==";</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.js"></script>
    <script>
        Vue.component('video-player', {
            template: '#video-player-template',
            props: ['url', 'title', 'description'],
            ready() {
                var player = jwplayer('video');
                player.setup({
                    file: this.url,
                    width: 600,
                    height: 400,
                    title: this.title,
                    description: this.description
                });
            }
        });

        Vue.component('video-search', {
            template: '#video-search-template',
            props: ['url', 'query'],
            methods: {
                search: function() {
                    console.log('search');
                }
            }
        });

        new Vue({
            el: '#app',

            data: {
                url: 'https://www.youtube.com/watch?v=ZTLAx3VDX7g',
                query: ''
            }
        });
    </script>
@stop