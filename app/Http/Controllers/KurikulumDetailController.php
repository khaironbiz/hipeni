<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum_detail;
use App\Http\Requests\StoreKurikulum_detailRequest;
use App\Http\Requests\UpdateKurikulum_detailRequest;
use Illuminate\Support\Facades\Auth;

class KurikulumDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreKurikulum_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKurikulum_detailRequest $request)
    {
        $data               = $request->validated();
        $data['slug']       = md5(uniqid());
        $data['created_by'] = Auth::id();
        $kurikulum_detail   = new Kurikulum_detail();
        $create             = $kurikulum_detail->create($data);
        if($create){
            return back()->with('success', 'Data berhasil disimpan');
        }else{
            return back()->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kurikulum_detail  $kurikulum_detail
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
//        dd('sukses');
        $kurikulum_detail = Kurikulum_detail::with('kurikulum')->with('study_method')->where('slug', $slug)->first();
        $data = [
            'title'             => 'Kurikulum detail',
            'class'             => 'Kurikulum',
            'sub_class'         => 'Detail Kurikulum',
            'kurikulum_detail'  => $kurikulum_detail,

        ];
        return view('admin.kurikulum.detail.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurikulum_detail  $kurikulum_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurikulum_detail $kurikulum_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKurikulum_detailRequest  $request
     * @param  \App\Models\Kurikulum_detail  $kurikulum_detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKurikulum_detailRequest $request, Kurikulum_detail $kurikulum_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurikulum_detail  $kurikulum_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kurikulum_detail $kurikulum_detail)
    {
        //
    }
}
