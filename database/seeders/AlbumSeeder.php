<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::create(['name' => 'Family Album']);
        Album::create(['name' => 'Vacation Album']);
        Album::create(['name' => 'Wedding Album']);
    }
}
