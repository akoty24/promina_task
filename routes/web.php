<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::resource('albums', AlbumController::class);
Route::resource('pictures', PictureController::class);
Route::get('/albums/{id}/delete-pictures', [AlbumController::class, 'deletePictures'])->name('albums.delete-pictures');
Route::post('/albums/{id}/move-pictures', [AlbumController::class, 'movePictures'])->name('albums.move-pictures');


