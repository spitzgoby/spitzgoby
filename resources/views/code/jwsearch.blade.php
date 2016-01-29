@extends('layouts.sidebar')

@section('style')
    <link rel="stylesheet" href="/css/jwsearch.css">
@stop

@section('content')

   <div id="app">
       <video-player
           url="https://www.youtube.com/watch?v=ZTLAx3VDX7g"
           title="Star Wars Acapella"
           description="Jimmy Fallon and the cast of The Force Awakens sing the
                    theme songs from Star Wars"
       ></video-player>

       <video-search></video-search>


       <template id="video-player-template">
           <div id="video"><i class="fa fa-spinner fa-spin"></i> Loading video player...</div>
       </template>

       <template id="video-search-template">
           <div class="search-results">
               <div class="input-group">
                   <input type="text" v-model="query" class="form-control" placeholder="Search Youtube...">
              <span class="input-group-btn">
                  <button class="btn btn-default" @click="search">Search</button>
              </span>
               </div>
               <ul class="list-unstyled">
                   <li v-for="result in results" class="result">
                       <div @click="setVideo($index)">
                           <div class="video-thumbnail">
                               <img :src="result.thumbnailUrl" alt="Video thumbnail">
                           </div>
                           <div class="info">
                               <h3>@{{ result.title }}</h3>
                               <p>@{{ result.description }}</p>
                           </div>
                       </div>
                   </li>
               </ul>
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
            events: {
                'loadVideo': function(video) {
                    this.setVideo(video);
                    var self = this;
                    this.player.load({
                        file: self.url,
                        title: self.title,
                        description: self.description
                    });
                }
            },

            methods: {
                setVideo: function(video) {
                    console.log(video);
                    this.url = "https://youtube.com/watch?v=" + video.videoID;
                    this.title = video.title;
                    this.description = video.description;
                }
            },

            ready() {
                var player = jwplayer('video');
                this.player = player;
                player.setup({
                    file: this.url,
                    width: "100%",
                    aspectratio: "3:2",
                    title: this.title,
                    description: this.description
                });
            }
        });

        Vue.component('video-search', {
            template: '#video-search-template',
            data: function() {
                return {
                    query: "",
                    results: []
                };
            },
            methods: {
                search: function() {
                    console.log('search');
                    var self = this;
                    $.ajax({
                        data: { query: self.query },
                        url: '/api/code/jwsearch',
                        success: function(data) {
                            var parser = new YoutubeSearchResultParser(data);
                            self.results = parser.parseSearchResults();
                        }
                    });
                },

                setVideo: function(index) {
                    var video = this.results[index];
                    this.$dispatch('videoChanged', video);
                }
            }
        });

        new Vue({
            el: '#app',

            events: {
                'videoChanged': function(video) {
                    this.$broadcast('loadVideo', video);
                }
            }

        });
    </script>
@stop