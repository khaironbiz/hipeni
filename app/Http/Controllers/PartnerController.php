<?php

namespace App\Http\Controllers;

use App\Models\Education_user;
use App\Models\Partner;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners   = Partner::all();
        $data = [
            'title'     => 'Our Partner',
            'navbar'    => 'partner',
            'partners'  => $partners
        ];
        return view('landing.partner.index', $data);
    }
    public function list()
    {
        $partners   = Partner::all();
        $data = [
            'title'     => 'Our Partner',
            'class'     => 'partner',
            'sub_class' => 'list',
            'navbar'    => 'partner',
            'partners'  => $partners
        ];
        return view('admin.partner.index', $data);
    }

    public function create()
    {
       $user = User::all();
        $data = [
            'title'     => 'Create Partner',
            'class'     => 'partner',
            'sub_class' => 'list',
            'navbar'    => 'partner',
            'user'      => $user
        ];
        return view('admin.partner.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePartnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request)
    {
        $data               = new Partner();
        $user               = User::find($request->id_pj);
        $data->nama_partner =$request->nama_partner;
        $data->singkatan    =$request->singkatan;
        $data->email        =$request->email;
        $data->hp           =$request->hp;
        $data->website      =$request->website;
        $data->id_pj        =$request->id_pj;
        $data->nama_pj      =$user->nama_lengkap;
        $data->slug         =md5(uniqid());
        $data->nomor_sk     ='';
        $data->tanggal_sk   ='2022-12-12';
        $data->valid_to     ='2022-12-12';
        //aksi ambil logo
        $file               = $request->file('file');
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload      = 'assets/upload/images/partners/';
        $extension          = $request->file->extension();
        // upload file
        $nama_file_baru     = uniqid().".".$extension;
        //memberi nama logo
        $data->logo         = $nama_file_baru;
        $tambah_data        = $data->save();
        if($tambah_data){
            $file->move($tujuan_upload,$nama_file_baru);
            return redirect()->route('admin.partner.list')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('admin.partner.create')->with(['error'=>'Data gagal disimpan']);
        }
    }


    public function show(Partner $partner)
    {
        $user = User::all();
        $data = [
            'title'     => 'Create Partner',
            'class'     => 'partner',
            'sub_class' => 'list',
            'navbar'    => 'partner',
            'user'      => $user
        ];
        return view('admin.partner.create', $data);
    }
    public function detail($slug)
    {
        $partner = Partner::firstWhere('slug', $slug);
        $data = [
            'title'     => 'Create Partner',
            'class'     => 'partner',
            'sub_class' => 'list',
            'navbar'    => 'partner',
            'partner'   => $partner
        ];
        return view('admin.partner.detail', $data);
    }
    public function edit_partner($slug)
    {
        $user = User::all();
        $partner = Partner::firstWhere('slug', $slug);
        $data = [
            'title'     => 'Create Partner',
            'class'     => 'partner',
            'sub_class' => 'list',
            'navbar'    => 'partner',
            'partner'   => $partner,
            'user'      => $user
        ];
        return view('admin.partner.edit', $data);
    }
    public function update_partner(Request $request, $id)
    {
        $data               = Partner::find($id);
        $user               = User::find($request->id_pj);
        $data->nama_partner = $request->nama_partner;
        $data->singkatan    = $request->singkatan;
        $data->email        = $request->email;
        $data->hp           = $request->hp;
        $data->website      = $request->website;
        $data->id_pj        = $request->id_pj;
        $data->nama_pj      = $user->nama_lengkap;
        $data->slug         = md5(uniqid());
        $data->nomor_sk     = $request->nomor_sk;
        $data->tanggal_sk   = '2022-12-12';
        $data->valid_to     = '2022-12-12';
        //aksi ambil logo
        $file               = $request->file('file');
        if($file !=''){
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload      = 'assets/upload/images/partners/';
            $extension          = $request->file->extension();
            // upload file
            $nama_file_baru     = uniqid().".".$extension;
            //memberi nama logo
            $file_lama          = $tujuan_upload.$data->logo;
            $data->logo         = $nama_file_baru;
            unlink($file_lama);
            $file->move($tujuan_upload,$nama_file_baru);
        }

        $tambah_data        = $data->save();
        if($tambah_data){
            return redirect()->route('admin.partner.list')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('admin.partner.create')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartnerRequest  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete data
        $data = Partner::find($id);
        $delete_data = $data->delete();
        $lokasi_file = 'assets/upload/images/partners/'.$data->logo;
        if($delete_data){
            if(file_exists($lokasi_file)){
                unlink($lokasi_file);
            }
            return redirect('admin.partner.list')->with(['success'=>'Data berhasil dihapus']);

        }
    }

}
