<?php

namespace App\Http\Controllers;

use App\Http\Requests\PictureRequest;
use App\Models\Album;
use App\Models\Picture;
use App\Services\PictureService;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    protected $pictureService;

    public function __construct(PictureService $pictureService)
    {
        $this->pictureService = $pictureService;
    }

    public function index()
    {
        $pictures = Picture::all();
        return view('front.pictures.index', compact('pictures'));
    }

    public function create()
    {
        $albums = Album::all();
        return view('front.pictures.create', compact('albums'));
    }

    public function store(PictureRequest $request)
    {
        $validatedData = $request->validated();
        $this->pictureService->createPicture($validatedData);
        return redirect()->route('pictures.index')->with('success', 'Pictures uploaded successfully!');
    }

    public function edit(Picture $picture)
    {
        $albums = Album::all();
        return view('front.pictures.edit', compact('picture', 'albums'));
    }

    public function update(PictureRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->pictureService->updatePicture($id, $validatedData);
        return redirect()->route('pictures.index')->with('success', 'Picture updated successfully!');
    }

    public function show($id)
    {
        $picture = Picture::findOrFail($id);
        return view('front.pictures.show', compact('picture'));
    }

    public function destroy($id)
    {
        $this->pictureService->deletePicture($id);
        return redirect()->route('pictures.index')->with('success', 'Picture deleted successfully!');
    }
}