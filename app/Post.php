<?php

namespace App;

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
    protected $fillable = ['title', 'summary', 'content', 'published_at'];

    /**
     * Configuration variables for slugging
     *
     * @var array
     */
    protected $sluggable = ['build_form' => 'title'];

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
        return str_limit(strip_tags($this->content), 200);
    }

    /**
     * An article belongs to one user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
