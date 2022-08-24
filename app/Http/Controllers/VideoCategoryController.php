<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Video_category;
use App\Http\Requests\StoreVideo_categoryRequest;
use App\Http\Requests\UpdateVideo_categoryRequest;
use Illuminate\Support\Facades\Auth;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video_categories = Video_category::all();
        $data = [
            'title'             => 'Video Categories',
            'navbar'            => 'video',
            'class'             => 'categories',
            'sub_class'         => 'index',
            'video_categories'  => $video_categories
        ];
        return view('admin.video_category.index', $data);
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
     * @param  \App\Http\Requests\StoreVideo_categoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideo_categoryRequest $request)
    {
        $data               = $request->validated();
        $data['slug']       = md5(uniqid());
        $data['created_by'] = Auth::id();
        $data['created_at'] = now();
        $video_category     = new Video_category();
        $add_category       = $video_category->create($data);
        if($add_category){
            return back()->with('success', "Data berhasil disimpan");
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video_category  $video_category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $video_category = Video_category::where('slug', $slug)->first();
        $videos         = Video::where('category', $video_category->id)->where('publish', 0)->get();
        $data = [
            'title'             => 'Video Category detail',
            'navbar'            => 'video',
            'class'             => 'videos',
            'sub_class'         => 'category',
            'video_category'    => $video_category,
            'videos'            => $videos
        ];
        return view('admin.video_category.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video_category  $video_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Video_category $video_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideo_categoryRequest  $request
     * @param  \App\Models\Video_category  $video_category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideo_categoryRequest $request, $slug)
    {
        $video_category = Video_category::where('slug', $slug)->first();
        $data           = $request->validated();
        $update_data    = $video_category->update($data);
        if($update_data){
            return back()->with('success', 'Data berhasil diupdate');
        }else{
            return back()->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video_category  $video_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Video_category::destroy($id);
        if($delete){
            dd("Berhasil didelete");
        }
    }
}
