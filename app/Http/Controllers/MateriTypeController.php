<?php

namespace App\Http\Controllers;


use App\Models\Materi_type;
use App\Http\Requests\StoreMateri_typeRequest;
use App\Http\Requests\UpdateMateri_typeRequest;
use Illuminate\Support\Facades\Auth;

class MateriTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $materi_type    = Materi_type::with('user')->get();
        $data = [
            'title'             => "Type of Materi",
            'class'             => 'trainings',
            'sub_class'         => 'trainings',
            'materi_type'       => $materi_type,
        ];
        return view('admin.materi.type.index', $data);
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
     * @param  \App\Http\Requests\StoreMateri_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateri_typeRequest $request)
    {
        //
        $data               = $request->validated();
        $data['slug']       = uniqid();
        $data['created_by'] = Auth::id();
        $materi_type        = new Materi_type();
        $add                = $materi_type->create($data);
        if($add){
            return redirect()->route('admin.materi.type')->with('success', 'Data berhasil disimpan');
        }
        return back()->with('warning', 'Data gagal disimpan');
    }

    public function show(Materi_type $materi_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi_type  $materi_type
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $materi_type = Materi_type::where('slug', $slug)->first();

        $data = [
            'title'             => "Edit Data",
            'class'             => 'materi',
            'sub_class'         => 'materi type',
            'materi_type'       => $materi_type,
        ];
        return view('admin.materi.type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMateri_typeRequest  $request
     * @param  \App\Models\Materi_type  $materi_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateri_typeRequest $request, $slug)
    {
        //
        $data           = $request->validated();

        $materi_type    = Materi_type::where('slug', $slug)->first();
        $update         = $materi_type->update($data);
        if($update){
            return redirect()->route('admin.materi.type')->with('success', 'Data berhasil diupdate');
        }else{
            return back()->with('warning', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi_type  $materi_type
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $materi_type    = Materi_type::where('slug', $slug)->first();
        $delete         = Materi_type::destroy($materi_type->id);
        if($delete){
            return redirect()->route('admin.materi.type')->with('success', 'Data berhasil hihapus');
        }
        return redirect()->route('admin.materi.type')->with('success', 'Data gagal disimpan');

    }
}
