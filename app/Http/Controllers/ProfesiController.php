<?php

namespace App\Http\Controllers;

use App\Models\Example;
use App\Models\Organisasi_profesi;
use Illuminate\Support\Str;
use App\Models\Profesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;


class ProfesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'title'     => 'Daftar Profesi',
            'class'     => 'Profesi',
            'sub_class' => 'Index',
            'profesi'   => Profesi::all()->sortBy('nama_profesi'),
        ];
        return view('admin.profesi.index', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_profesi' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('profesi')
                ->withErrors($validator)
                ->withInput();
        }else {
            $profesi = new Profesi();
            $profesi->nama_profesi = $request->get('nama_profesi');
            $profesi->slug = Str::slug($request->get('nama_profesi'), '-');
            $profesi->created_by = '0';
            $profesi->save();

            if ($profesi) {
                return redirect()->route('profesi')->with(['success' => 'data anda tersimpan']);
            } else {
                return redirect()->route('profesi')->with(['error' => 'data gagal tersimpan']);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        //
        $profesi = Profesi::firstWhere('slug', $slug);
        $organisasi = Organisasi_profesi::where('id_profesi', $profesi->id)->get();
        $data = [
            'title'     => 'Daftar Profesi',
            'class'     => 'Profesi',
            'sub_class' => 'Show',
            'profesi'   => $profesi,
            'organisasi'=> $organisasi,
        ];
        return view('admin.profesi.detail', $data);
    }
    public function pdf(){
//        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadHTML('<h1>Test</h1>');
//        return $pdf->stream();

        $data = [
            'title'     => 'Daftar Profesi',
            'class'     => 'Profesi',
            'sub_class' => 'Index',
            'profesi'   => Profesi::all()->sortBy('nama_profesi'),
        ];
        $pdf = PDF::loadview('admin.profesi.index',$data);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
