<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $familyAlbum = Album::where('name', 'Family Album')->first();
        $vacationAlbum = Album::where('name', 'Vacation Album')->first();
        $weddingAlbum = Album::where('name', 'Wedding Album')->first();

        Picture::create(['name' => 'Family Picture 1', 'album_id' => $familyAlbum->id]);
        Picture::create(['name' => 'Family Picture 2', 'album_id' => $familyAlbum->id]);

        Picture::create(['name' => 'Vacation Picture 1', 'album_id' => $vacationAlbum->id]);
        Picture::create(['name' => 'Vacation Picture 2', 'album_id' => $vacationAlbum->id]);

        Picture::create(['name' => 'Wedding Picture 1', 'album_id' => $weddingAlbum->id]);
        Picture::create(['name' => 'Wedding Picture 2', 'album_id' => $weddingAlbum->id]);
 
    }
}
