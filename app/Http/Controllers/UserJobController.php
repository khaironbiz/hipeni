<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_job;
use App\Http\Requests\StoreUser_jobRequest;
use App\Http\Requests\UpdateUser_jobRequest;
use Illuminate\Support\Facades\Auth;

class UserJobController extends Controller
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
            'title'     => "Riwayat Pekerjaan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'user_job'  => new User_job(),
            'submit'    => 'Save'
        ];
        return view('landing.user.job.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_jobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_jobRequest $request)
    {
        $data               = $request->validated();
        $data['user_id']    = Auth::id();
        $data['slug']       = uniqid();
        $user_job           = new User_job();
        $add_data           = $user_job->create($data);
        if($add_data){
           return back()->with('success', 'Data berhasil disimpan');
        }else{
            return back()->with('error', 'Data gagal disimpan');
        }
    }
    public function show(User_job $user_job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_job  $user_job
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $data = [
            'title'     => "Riwayat Pekerjaan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'user_job'  => User_job::where('slug', $slug)->first(),
            'submit'    => 'Update',
        ];
        return view('landing.user.job.edit', $data);
    }


    public function update(UpdateUser_jobRequest $request, $slug)
    {

        $user_job           = User_job::where('slug', $slug)->first();
        $data               = $request->validated();
        $update_data        = $user_job->update($data);
        if($update_data){
            return back()->with('success', 'Data berhasil diupdate');
        }else{
            return back()->with('error', 'Data gagal diupdate');
        }
    }
    public function delete($slug){
        $data = [
            'title'     => "Riwayat Pekerjaan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'user_job'  => User_job::where('slug', $slug)->first(),
            'submit'    => 'Update',
        ];
        return view('landing.user.job.delete', $data);
    }

    public function destroy($id)
    {
        //
        $delete = User_job::destroy($id);
        if($delete){
            return redirect()->route('profile')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->route('profile')->with('errorr', 'Data gagal dihapus');
        }
    }
}
