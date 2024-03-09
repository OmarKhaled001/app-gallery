<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AlbumController extends Controller
{

    public function allAlbums()
    {   
        // get all albums
        $albums = Album::where('user_id',Auth()->user()->id)->get();
        // return view whith date
        return view('home',compact('albums'));
    }

    public function createAlbums()
    {   
        // return forme view 
        return view('pages.albums.add');
    }

    public function showAlbum($slug)
    {
        // get all albums
        $albums = Album::where('user_id',Auth()->user()->id)->get();
        // get album by slug
        $album = Album::where('slug',$slug)->first();
        // return view whith date
        return view('pages.albums.view',compact('album','albums'));
    }

    public function addAlbum(Request $request)
    {
        // check date valid or no
        $request->validate([
            'title'  => 'required|max:255',
            'slug'  =>  'unique:albums',
            'images' => 'required|max:10000',
        ]);
        DB::beginTransaction();
        try {
            // create album by request
            $album = new Album();
            $album-> user_id =  Auth()->user()->id;
            $album-> title   =  $request->title;
            $album-> slug    =  Str::slug($request->title) ;
            // add images from request 
            if ($images = $request->images) {
                foreach ($images as $image)
                {
                    // add image to collection
                    $album->addMedia($image)->toMediaCollection($album-> slug);
                }
            }
            // save album
            $album->save();
            DB::commit();
            // redirect to albums 
            return redirect()->route('albums.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateAlbum(Request $request)
    {
        // check date valid or no
        $request->validate([
            'title'  => 'required|max:255',
        ]);
        DB::beginTransaction();
        try {
            // find album by id request
            $album = Album::find($request->id);
            $album-> user_id =  Auth()->user()->id;
            $album-> slug    =  Str::slug($request->title) ;
            // save album
            $album->save();
            DB::commit();
            // redirect to albums 
            return redirect()->route('albums.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteAlbum(Request $request)
    {
        DB::beginTransaction();
        try {
            // get album by slug
            $album = Album::where('slug',$request->slug)->first();
            // check has media or no
            if($request->hasFile($request->slug)){
                // delete media by collection
                $album->clearMediaCollection($request->slug);
            }
            // delete album 
            $album->delete();
            DB::commit();
            // redirect to albums  
            return redirect()->route('albums.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteImage(Request $request)
    {
        DB::beginTransaction();
        try {
            // delete album by slug
            Media::destroy($request->id);
            DB::commit();
            // redirect back 
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function moveAlbum(Request $request)
    {  
        DB::beginTransaction();
        try {
            // get choosed album by id request
            $newAlbum   = Album::find($request->album_id);
            // get old album and his media by id request and slug == collection
            $oldAlbum   = Album::find($request->id);
            // update date image one by one for move to new album
            $images     = $oldAlbum->getMedia($oldAlbum->slug);
            foreach ($images  as $image) {
                $image->model_id        = $newAlbum->id;
                $image->collection_name = $newAlbum->slug;
                // save image
                $image->save();
                DB::commit();
            }
            // delete old albume after move his images
            $oldAlbum->delete();
            DB::commit();
            // redirect to albums
            return redirect()->route('albums.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function moveImage(Request $request)
    {   
        DB::beginTransaction();
        try {
            // get image by id request
            $image     = Media::find($request->id);
            // get choosed album by id request
            $newAlbum  = Album::find($request->album_id);
            // update date image for move to new album
            $image->model_id        = $newAlbum->id;
            $image->collection_name = $newAlbum->slug;
            // save image
            $image->save();
            DB::commit();
            // redirect back
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
