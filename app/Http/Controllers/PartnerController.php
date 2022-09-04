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

        $user               = User::find($request->id_pj);
        $input              = $request->validated();
        $input['nama_pj']   = $user->nama_lengkap;
        $input['slug']      = md5(uniqid());
        $data               = new Partner();
        //aksi ambil logo
        $file               = $request->file('file');
        if($file !=''){
            $validated = $request->validate([
                'file' => 'required|image'
            ]);
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload      = 'assets/upload/images/partners/';
            $extension          = $request->file->extension();
            // upload file
            $nama_file_baru     = uniqid().".".$extension;
            $input['logo']      = $nama_file_baru;
            $file->move($tujuan_upload,$nama_file_baru);
        }
        $tambah_data = $data->create($input);
        if($tambah_data){
            return redirect()->route('admin.partner.list')->with(['success'=>'Data berhasil disimpan']);
        }else{
            unlink($tujuan_upload.$nama_file_baru);
            return back()->withInput()->with(['error'=>'Data gagal disimpan']);
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
    public function update_partner(UpdatePartnerRequest $request, $id)
    {
        $partner            = Partner::find($id);
        $user               = User::find($request->id_pj);
        $input              = $request->validated();
        $input['slug']      = md5(uniqid());
        $input['nama_pj']   = $user->nama_lengkap;

        //aksi ambil logo
        $file               = $request->file('file');
        if($file !=''){
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload      = 'assets/upload/images/partners/';
            $extension          = $request->file->extension();
            // upload file
            $nama_file_baru     = uniqid().".".$extension;
            //memberi nama logo
            $file_lama          = $tujuan_upload.$partner->logo;
            $input['logo']      = $nama_file_baru;
            if (file_exists($file_lama)) {
                unlink($file_lama);
            } else {
                echo "The file does not exist";
            }

            $file->move($tujuan_upload,$nama_file_baru);
        }

        $update = $partner->update($input);
        if($update){
            return redirect()->route('admin.partner.list')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return dd('ggaal');
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
            return redirect()->route('admin.partner.list')->with(['success'=>'Data berhasil dihapus']);

        }
    }

}
