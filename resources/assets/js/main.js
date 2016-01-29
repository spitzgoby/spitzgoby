function YoutubeSearchResultParser(data) {
    this.data = data;

    this.parseObject = function(data) {
        if (typeof data === 'undefined') {
            data = this.data;
        }

        return {
            videoID: data.id.videoId,
            title: data.snippet.title,
            description: data.snippet.description,
            publishedAt: data.snippet.publishedAt,
            thumbnailUrl: data.snippet.thumbnails.default.url
        };
    };

    this.parseObjects = function(data) {
        if (typeof data === 'undefined') {
            data = this.data;
        }

        var self = this;
        var videos = [];
        data.forEach(function(video){
            videos.push(self.parseObject(video));
        });
        return videos;
    };

    this.parseString = function(data) {
        if (typeof data === 'undefined') {
            data = this.data;
        }

        return this.parseObject(JSON.parse(data));
    };

    this.parseSearchResults = function(data) {
        if (typeof data === 'undefined') {
            data = this.data;
        }

        if (typeof data === 'string') {
            return this.parseString(data);l
        }

        if ($.isArray(data)) {
            return this.parseObjects(data);
        }

        return this.parseObject(data);
    };
}
