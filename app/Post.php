<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    /**
     * Attribtues that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'published_at'];

    /**
     * Configuration variables for slugging
     *
     * @var array
     */
    protected $sluggable = ['build_from' => 'title'];

    /**
     * Get the article's html
     * @return string
     */
    public function getHtmlAttribute()
    {
        return Markdown::convertToHtml($this->content);
    }

    /**
     * Get a summary of the article.
     * @return string
     */
    public function getSummaryAttribute()
    {
        return str_limit(strip_tags($this->html), 200);
    }

    /**
     * @param mixed $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * @return string
     */
    public function getPublishedAtAttribute()
    {
        $carbon = \Carbon\Carbon::parse($this->attributes['published_at']);
        return $carbon->format('Y-m-d');
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all tags associated with the post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
