<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['title', 'slug', 'is_show', 'parent_id', 'is_active'];

    protected $appends = ['hero_image'];

    protected $with = ['image'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->doNotGenerateSlugsOnCreate()
            ->doNotGenerateSlugsOnUpdate()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    public function getHeroImageAttribute()
    {
        if (!empty($this->image)) {
            return \Storage::disk('public')->url('categories'.DIRECTORY_SEPARATOR.$this->image->media_file);
        }
    }

    public function image()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
