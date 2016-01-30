@extends('layouts.sidebar')

@section('style')
    <link rel="stylesheet" href="/css/jwsearch.css">
@stop

@section('content')

   <div id="app">
       {{-- JWPlayer Component --}}
       <video-player
           url="https://www.youtube.com/watch?v=ZTLAx3VDX7g"
           title="Star Wars Acapella"
           description="Jimmy Fallon and the cast of The Force Awakens sing the
                    theme songs from Star Wars"
       ></video-player>

       {{-- Youtube Search Box Component --}}
       <video-search></video-search>

       {{-- JWPlayer Component Template --}}
       <template id="video-player-template">
           <div id="video">
               <i class="fa fa-spinner fa-spin"></i> Loading video player...
           </div>
       </template>

       {{-- Youtube Search Box Component Template --}}
       <template id="video-search-template">
           <div class="search-results">
               <div class="input-group">
                  <input type="text"
                         v-model="query"
                         @keyup.enter="search"
                         class="form-control"
                         placeholder="Search Youtube...">
                  <span class="input-group-btn">
                      <button class="btn btn-default" @click="search">Search</button>
                  </span>
               </div>
               {{-- Searching Spinner --}}
               <div class="alert alert-info" v-if="searching">
                   <i class="fa fa-spinner fa-spin"></i> Searching...
               </div>

               {{-- Error message --}}
               <div class="alert alert-warning" v-if="!searching && !!errorMessage">
                   @{{ errorMessage }}
               </div>

               {{-- Search Results --}}
               <ul v-if="!searching && !errorMessage" class="list-unstyled">
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
    {{-- Import JWPlayer and set key  --}}
    <script src="/js/lib/jwplayer.js"></script>
    <script>jwplayer.key="N9BKmmi9T17VvXMGliiUJKAlBEcW2qk9He72pw==";</script>
    {{-- Import Vue.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.js"></script>
    {{-- Vue components --}}
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
                    searching: false,
                    query: "",
                    results: [],
                    errorMessage: null
                };
            },
            methods: {
                search: function() {
                    this.searching = true;
                    var self = this;
                    $.ajax({
                        data: { query: self.query },
                        url: '/api/code/jwsearch',
                        success: function(data) {
                            var parser = new YoutubeSearchResultParser(data);
                            self.results = parser.parseSearchResults();
                            self.errorMessage = null;
                            self.searching = false;
                        },
                        error: function(err) {
                            self.results = [];
                            self.errorMessage = 'Whoops, something went wrong';
                            self.searching = false;
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