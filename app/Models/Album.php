<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Album extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('album')->useDisk('media');
    }
}
