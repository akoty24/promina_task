<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Picture extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('picture')->useDisk('media');
    }
}
