<?php

namespace App\Services;

use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class PictureService
{
   
    public function createPicture($data)
    {
        foreach ($data['image'] as $image) {
            $picture = new Picture();
            $picture->name = $data['name'];
            $picture->album_id = $data['album_id'];
            $picture->save();

            $this->storeImage($picture, $image);
        }
    }

    public function updatePicture($id, $data)
    {
        $picture = Picture::findOrFail($id);
        $picture->name = $data['name'];
        $picture->album_id = $data['album_id'];

        if (isset($data['image'])) {
            $this->updateImage($picture, $data['image']);
        }

        $picture->save();
    }


    public function deletePicture($id)
    {
        $picture = Picture::findOrFail($id);
         $picture->clearMediaCollection('picture');
        $picture->delete();
    }


    private function storeImage($picture, $image)
    {

        $picture->addMedia($image)->toMediaCollection('picture');

    }

    private function updateImage($picture, $image)
    {
      
         $picture->clearMediaCollection('picture'); 
         $picture->addMedia($image)->toMediaCollection('picture');

    }
}
