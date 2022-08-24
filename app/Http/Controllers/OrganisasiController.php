<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Organisasi_profesi;
use App\Models\Profesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrganisasiController extends Controller
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
            'title'         => 'Daftar Organisasi Profesi',
            'class'         => 'Organisasi',
            'sub_class'     => 'index',
            'profesi'       => Profesi::all()->sortBy('nama_profesi'),
            'organisasi'    => Organisasi_profesi::all()->sortBy('nama_op'),
        ];
        return view('admin.organisasi.index', $data);
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
            'nama_op' => 'required',
            'singkatan' => 'required|unique:organisasi_profesis,singkatan',
            'pimpinan' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'hp' => 'required',
            'web' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('organisasi')
                ->withErrors($validator)
                ->withInput();
        }else {
            $organisasi = new Organisasi_profesi();
            $organisasi->id_profesi = $request->get('id_profesi');
            $organisasi->nama_op    = $request->get('nama_op');
            $organisasi->slug_op    = Str::slug($request->get('nama_op'), '-');
            $organisasi->singkatan  = $request->get('singkatan');
            $organisasi->pimpinan   = $request->get('pimpinan');
            $organisasi->alamat     = $request->get('alamat');
            $organisasi->email      = $request->get('email');
            $organisasi->telp       = $request->get('telp');
            $organisasi->hp         = $request->get('hp');
            $organisasi->web        = $request->get('web');
            $organisasi->created_by = '0';
            $organisasi->save();

            if ($organisasi) {
                return redirect()->route('organisasi')->with(['success' => 'data anda tersimpan']);
            } else {
                return redirect()->route('organisasi')->with(['error' => 'data gagal tersimpan']);
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
        $data = [
            'title'         => 'Daftar Organisasi Profesi',
            'class'         => 'Organisasi',
            'sub_class'     => 'Show',
            'organisasi'    => Organisasi_profesi::firstWhere('slug_op', $slug),
        ];
        return view('admin.organisasi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data       = Organisasi_profesi::findOrFail($id);
        $qrcode     = QrCode::size(400)->generate($data->nama_op);
        return view('qrcode',compact('qrcode'));
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
