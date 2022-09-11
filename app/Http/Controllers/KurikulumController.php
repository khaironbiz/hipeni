<?php

namespace App\Http\Controllers;

use App\Models\Education_level;
use App\Models\Education_type;
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
        $sifat_pendidikan           = 2;
        $education_type             = Education_type::where('sifat', $sifat_pendidikan)->first();
        $education_level            = Education_level::where('education_type_id', $education_type->id)->get();
        $training                   = Training::with('kurikulum')->get();
        $data       = [
            'title'         => "Kurikulum",
            'class'         => 'trainings',
            'sub_class'     => 'trainings',
            'education_level'=> $education_level,
            'training'      => $training
        ];
        return view('admin.kurikulum.index', $data);
    }
    public function materi()
    {
        $kurikulum  = Kurikulum::with('materi_type')->get();
        $training   = Training::all();
        $materi_type= Materi_type::all();
        $data       = [
            'title'         => "Materi Pembelajaran",
            'class'         => 'trainings',
            'sub_class'     => 'trainings',
            'kurikulum'     => $kurikulum,
            'training'      => $training,
            'materi_type'   => $materi_type
        ];
        return view('admin.kurikulum.materi', $data);
    }
    public function create($slug)
    {
        $training_ini   = Training::where('slug', $slug)->first();
        $training_all   = Training::all();
        $materi_type    = Materi_type::all();
        $data       = [
            'title'         => "Materi Pembelajaran",
            'class'         => 'trainings',
            'sub_class'     => 'trainings',
            'training_ini'  => $training_ini,
            'training_all'  => $training_all,
            'materi_type'   => $materi_type,
            'kurikulum'     => new Kurikulum(),
        ];
        return view('admin.kurikulum.create', $data);
    }

    public function store(StoreKurikulumRequest $request)
    {
        //
        $data               = $request->validated();
        $data['slug']       = md5(uniqid());
        $data['created_by'] = Auth::id();
        $kurikulum          = new Kurikulum();
        $add                = $kurikulum->create($data);
        if($add){
            return back()->with('success', 'Data berhasil disimpan');
        }else{
            return back()->with('error', 'Data gagal disimpan');
        }

    }

    public function show($slug)
    {
        $training = Training::where('slug', $slug)->first();
//        dd( $training->id);
        $kurikulum = Kurikulum::where('training_id', $training->id)->with('materi_type')->get();
        $materi_type= Materi_type::all();
        $data = [
            'title'     => 'Kurikulum '.$training->nama_training,
            'class'     => 'Kurikulum',
            'sub_class' => 'Detail Kurikulum',
            'kurikulum' => $kurikulum,
            'training'  => $training,
            'materi_type'   => $materi_type
        ];
        return view('admin.kurikulum.materi-detail', $data);
    }

    public function detail($slug){
        $kurikulum  = Kurikulum::with('materi_type')->where('slug', $slug)->first();
        $training   = Training::find($kurikulum->training_id);
        $data = [
            'title'     => 'Kurikulum',
            'class'     => 'Kurikulum',
            'sub_class' => 'Detail Kurikulum',
            'kurikulum' => $kurikulum,
            'training'  => $training,
        ];
        return view('admin.kurikulum.detail', $data);
    }
    public function edit($slug)
    {
        $kurikulum      = Kurikulum::where('slug', $slug)->first();
        $training_all   = Training::all();
        $training_ini   = Training::find($kurikulum->training_id);
        $materi_type    = Materi_type::all();
        $data = [
            'title'         => 'Kurikulum ',
            'class'         => 'Kurikulum',
            'sub_class'     => 'Detail Kurikulum',
            'kurikulum'     => $kurikulum,
            'training_all'  => $training_all,
            'training_ini'  => $training_ini,
            'materi_type'   => $materi_type
        ];
        return view('admin.kurikulum.edit', $data);
        //
    }

    public function update(UpdateKurikulumRequest $request, $slug)
    {
        $kurikulum  = Kurikulum::where('slug', $slug)->first();
        $data       = $request->validated();
        $update     = $kurikulum->update($data);
        if($update){
            return back()->with('success', 'Data berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $kurikulum  = Kurikulum::where('slug', $slug)->first();
        $delete     = $kurikulum->destroy($kurikulum->id);
        if($delete){
            return redirect()->route('admin.kurikulum')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->route('admin.kurikulum')->with('error', 'Data gagal dihapus');
        }
    }
}
