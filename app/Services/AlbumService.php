<?php 
namespace App\Services;

use App\Models\Album;

class AlbumService
{
    public function getAlbums(){
        return Album::all();
        
    }
    public function createAlbum($data)
    {
        $album = new Album();
        $album->name = $data['name'];
        $album->save();
    }

    public function updateAlbum($id, $data)
    {
        $album = Album::findOrFail($id);
        $album->name = $data['name'];
        $album->save();
    }

    public function deleteAlbum($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
    }

    public function deletePicturesInAlbum($id)
    {
        $album = Album::findOrFail($id);
        $album->pictures()->delete();
    }

    public function movePicturesToAlbum($sourceAlbumId, $targetAlbumId)
    {
        $sourceAlbum = Album::findOrFail($sourceAlbumId);
        $targetAlbum = Album::findOrFail($targetAlbumId);

        $sourceAlbum->pictures()->update(['album_id' => $targetAlbumId]);
    }
}