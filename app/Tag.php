<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements SluggableInterface
{
    use SluggableTrait;

    /**
     * The properties that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Configuration for slugging tags.
     *
     * @var array
     */
    protected $sluggable = ['build_from' => 'name'];

    /**
     * Finds or creates a tag matching the given value.
     *
     * @param int|string $value
     * @return Tag
     */
    public static function findOrCreate($value)
    {
        $tag = self::findBySlugOrId($value);
        if (!$tag) {
            $tag = self::create(['name' => $value]);
        }

        return $tag;
    }

    /**
     * Finds or creates a tag matching the elements of the given array.
     *
     * @param array<int|string> $values
     * @return Collection
     */
    public static function findOrCreateMany($values)
    {
        $tags = [];
        foreach($values as $value) {
            $tags[] = self::findOrCreate($value);
        }

        return new Collection($tags);
    }

    /**
     * A tag can be used in many posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
