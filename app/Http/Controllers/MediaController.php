<?php

namespace App\Http\Controllers;

use App\Media;
use App\Site;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Site $site)
    {
        $this->authorize('view', $site);;

        $medias = Media::where('site_id', $site->id)->get();


        return view('media.list', compact('medias', 'site'));
    }

    /**fileStore
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }

    //CUSTOM
    public function fileCreate(Site $site)
    {
        $this->authorize('view', $site);;
        $medias = Media::where('site_id', $site->id)->get();

        return view('media.upload', compact('medias', 'site'));
    }

    public function fileStore(Site $site, Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/'.$site->id),$imageName);

        $imageUpload = new Media();
        $imageUpload->filename = $imageName;
        $imageUpload->site_id = $site->id;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Site $site, Request $request)
    {
        $filename =  $request->get('filename');
        Media::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$site->id.'/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
