<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Http\Requests\StoreKurikulumRequest;
use App\Http\Requests\UpdateKurikulumRequest;
use App\Models\Materi_type;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurikulum  = Kurikulum::all();
        $training   = Training::all();
        $materi_type= Materi_type::all();
        $data       = [
            'title'         => "Metode Pembelajaran",
            'class'         => 'trainings',
            'sub_class'     => 'trainings',
            'kurikulum'     => $kurikulum,
            'training'      => $training,
            'materi_type'   => $materi_type
        ];
        return view('admin.kurikulum.index', $data);
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
     * @param  \App\Http\Requests\StoreKurikulumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKurikulumRequest $request)
    {
        //
        $data               = $request->validated();
        $data['slug']       = md5(uniqid());
        $data['created_by'] = Auth::id();
        $kurikulum          = new Kurikulum();
        $add                = $kurikulum->create($data);
        if($add){
            return redirect()->route('admin.kurikulum')->with('success', 'Data berhasil disimpan');
        }else{
            return back()->with('error', 'Data gagal disimpan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function show(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKurikulumRequest  $request
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKurikulumRequest $request, Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kurikulum $kurikulum)
    {
        //
    }
}
