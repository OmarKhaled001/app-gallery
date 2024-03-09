<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware('auth')->prefix('albums')->name('albums.')->controller(AlbumController::class)->group(function () {
    // all albums
    Route::get('/','allAlbums')->name('index');
    // all albums
    Route::get('/add','createAlbums')->name('create');
    // create new album
    Route::POST('/store','addAlbum')->name('store');
    // update album
    Route::get('/{album}/update','updateAlbum')->name('update');
    // show album with media
    Route::get('/{album}','showAlbum')->name('show');
    // delete album 
    Route::delete('/{album}','deleteAlbum')->name('destory');
    // delete image  
    Route::delete('/{album}/image', 'deleteImage')->name('image.destory');
    // move album's images   
    Route::PATCH ('/{album}/move', 'moveAlbum')->name('move');
    // move image  
    Route::PATCH ('/{album}/move/image', 'moveImage')->name('image.move');
});