<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use InteractsWithMedia;
    protected $fillable = [
        'title',
        'slug',
        'content',
        // 'image',
        'category_id',
        'published_at',
        'user_id'
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(400);

        $this->addMediaConversion('large')
            ->width(1200);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')->singleFile();

    }


    public function imageUrl($conversionName = '')
    {

        $media = $this->getFirstMedia();
        // if (!$media) {
        //     return null;
        // }
        if ($media->hasGeneratedConversion($conversionName)) {
            return $media?->getUrl($conversionName);
        }

        return $this->getFirstMediaUrl();
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function readTime($wordsPerMinute = 100)
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute);

        return max(1, $minutes);
    }

}
