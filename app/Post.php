<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'content', 'published_at'];

    /**
     * Configuration variables for slugging.
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'title',
        'on_update' => true
    ];

    /**
     * The tags that should not be stripped from a post's content.
     *
     * @var string
     */
    protected $allowableTags = "<pre><code><p>";

    /**
     * Get the article's html
     *
     * @return string
     */
    public function getHtmlAttribute()
    {
        return Markdown::convertToHtml($this->content);
    }

    /**
     * Get a summary of the article.
     *
     * @return string
     */
    public function getSummaryAttribute()
    {
        return str_limit(strip_tags($this->html, $this->allowableTags), 200);
    }

    /**
     * Set the publish date for a post.
     *
     * @param mixed $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Get the publish date for a post.
     *
     * @return string
     */
    public function getPublishedAtAttribute()
    {
        $carbon = \Carbon\Carbon::parse($this->attributes['published_at']);
        return $carbon->format('Y-m-d');
    }

    /**
     * Get all articles published on or prior to the current time.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('published_at', '<=', \Carbon\Carbon::now());
    }


    /**
     * Get $count most recent articles.
     *
     * @param Builder $query
     * @param int     $count
     * @return Builder $query
     */
    public function scopeRecent(Builder $query, int $count)
    {
        return $query->published()->orderBy('published_at', 'DESC')->take($count);
    }

    /**
     * Get a list of tags for the post
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }

    /**
     * An article belongs to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all tags associated with the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
