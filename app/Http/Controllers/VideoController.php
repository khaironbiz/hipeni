<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video_category;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video_categories = Video_category::all();
        $videos = Video::all();
        $data = [
            'title'         => 'Videos',
            'navbar'        => 'video',
            'class'         => 'video',
            'sub_class'     => 'index',
            'categories'    => $video_categories,
            'videos'        => $videos
        ];
        return view('admin.video.index', $data);
    }

    /**
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
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        $data               = $request->validated();
        $data['slug']       = md5(uniqid());
        $data['created_by'] = Auth::id();
        $data['created_at'] = now();
        $video              = new Video();
        $add_video          = $video->create($data);
        if($add_video){
            return back()->with('success', "Data berhasil disimpan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $video_categories = Video_category::all();
        $video = Video::where('slug',$slug)->first();
        $data = [
            'title'         => 'Video Categories',
            'navbar'        => 'video',
            'class'         => 'video',
            'sub_class'     => 'index',
            'categories'    => $video_categories,
            'video'         => $video
        ];
        return view('admin.video.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
