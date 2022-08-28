<?php

namespace App\Http\Controllers;

use App\Models\User_job;
use App\Models\User_organization;
use App\Http\Requests\StoreUser_organizationRequest;
use App\Http\Requests\UpdateUser_organizationRequest;
use Illuminate\Support\Facades\Auth;

class UserOrganizationController extends Controller
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
        $data = [
            'title'     => "Riwayat Organisasi",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'organisasi'=> new User_organization(),
            'submit'    => 'Save'
        ];
        return view('landing.user.organisasi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_organizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_organizationRequest $request)
    {
        $data               = $request->validated();
        if($data['active'] == 0){
            $data['selesai'] = $request->selesai;
        }
        $data['user_id']    = Auth::id();
        $data['slug']       = uniqid();
        $organisasi         = new User_organization();
        $add                = $organisasi->create($data);
        if($add){
            return redirect()->route('profile')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect()->route('profile')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_organization  $user_organization
     * @return \Illuminate\Http\Response
     */
    public function show(User_organization $user_organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_organization  $user_organization
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $organisasi = User_organization::where('slug', $slug)->first();
        $data = [
            'title'     => "Update Organisasi",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'organisasi'=> $organisasi,
            'submit'    => 'Update'
        ];
        return view('landing.user.organisasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_organizationRequest  $request
     * @param  \App\Models\User_organization  $user_organization
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_organizationRequest $request, $slug)
    {
        $organisasi         = User_organization::where('slug', $slug)->first();
        $data               = $request->validated();
        $data['selesai']    = $request->selesai;
        $update             = $organisasi->update($data);
        if($update){
            return redirect()->route('profile')->with('success', 'Data berhasil diupdate');
        }else{
            return redirect()->route('profile')->with('errorr', 'Data gagal diupdate');
        }
    }
    public function delete($slug){
        $organisasi = User_organization::where('slug', $slug)->first();
        $data = [
            'title'     => "Hapus Organisasi",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'organisasi'=> $organisasi,
            'submit'    => 'Update'
        ];
        return view('landing.user.organisasi.delete', $data);
    }
    public function destroy($id)
    {
        //
        $delete = User_organization::destroy($id);
        if ($delete) {
            return redirect()->route('profile')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('profile')->with('errorr', 'Data gagal dihapus');
        }
    }
}
