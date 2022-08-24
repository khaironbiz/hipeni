<?php

namespace App\Http\Controllers;

use App\Models\Education_level;
use App\Models\Education_type;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::with(['kota','kecamatan'])->get();
        $data = [
            'title'     => "Education Type",
            'class'     => 'Education',
            'sub_class' => 'level',
            'navbar'    => 'education',
            'provinsi'  => $provinsi,
        ];
        return view('landing.wilayah.provinsi', $data);
    }
    public function kota($code)
    {
        $kota = Kota::where('province_code', $code)->with(['provinsi','kecamatan','kelurahan'])->get();;
        $data = [
            'title'     => "Data Provinsi",
            'class'     => 'wilayah',
            'sub_class' => 'provinsi',
            'navbar'    => 'education',
            'kota'      => $kota,
        ];
        return view('landing.wilayah.kota', $data);
    }

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
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        //
    }
}
