<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Picture;
use App\Services\AlbumService;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    protected $albumService;

    public function __construct(AlbumService $albumService)
    {
        $this->albumService = $albumService;
    }

    public function index()
    {
        $albums = $this->albumService->getAlbums();
        return view('front.albums.index', compact('albums'));
    }

    public function store(AlbumRequest $request)
    {
        $validatedData = $request->validated();
        $this->albumService->createAlbum($validatedData);
        return redirect()->route('albums.index')->with('success', 'Album created successfully!');
    }

    public function update(AlbumRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->albumService->updateAlbum($id, $validatedData);
        return redirect()->route('albums.index')->with('success', 'Album updated successfully!');
    }
    public function show($id)
    {
        $album = Album::findOrFail($id);
        $pictures = Picture::where('album_id', $id)->get();       
    }
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('front.albums.edit', compact('album'));
    }
    public function destroy($id)
    {
        $this->albumService->deleteAlbum($id);
        return redirect()->route('albums.index')->with('success', 'Album deleted successfully!');
    }

    public function deletePictures($id)
    {
        $this->albumService->deletePicturesInAlbum($id);
        return redirect()->route('albums.index')->with('success', 'All pictures in the album have been deleted.');
    }

    public function movePictures(Request $request, $id)
    {
        $targetAlbumId = $request->input('target_album_id');
        $this->albumService->movePicturesToAlbum($id, $targetAlbumId);
        return redirect()->route('albums.index')->with('success', 'Pictures have been moved to another album.');
    }


}
