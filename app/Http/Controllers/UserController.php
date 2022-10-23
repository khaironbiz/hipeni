<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Education_user;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\User_job;
use App\Models\User_organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function index(){

        $data = [
            'title'     => "Data Karyawan",
            'class'     => 'User',
            'sub_class' => 'Index',
            'user'      => User::all()
        ];
        return view('admin.user.index', $data);
    }
    public function profile(){
//        $username = Auth::user()->username;
        $pendidikan = Education_user::with('education_level')
            ->where('user_id', Auth::user()->id)
            ->orderBy('tahun_lulus', 'ASC')
            ->get();
        $user_organisasi = User_organization::where('user_id', Auth::user()->id)
            ->orderBy('mulai', 'ASC')->get();
        $user_job = User_job::where('user_id', Auth::user()->id)
            ->orderBy('mulai', 'ASC')->get();
        $data = [
            'title'     => "Profile Karyawan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'pendidikan'=> $pendidikan,
            'user_job'  => $user_job,
            'organisasi'=> $user_organisasi
        ];
        return view('landing.user.profile', $data);
    }
    public function store(StoreUserRequest $request){
        $data                   = $request->validated();
        $data['nama_lengkap']   = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang.", ".$request->gelar_belakang;
        $data['tgl_lahir']      ="1984-09-06";
        $data['jenis_kelamin']  = 1;
        $data['username']       = Str::slug($request->username, '-');
        $data['password']       = hash::make($request->password);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        if( !empty($file)){
            $tujuan_upload = 'assets/upload/images/user/';
            // upload file
            $nama_file_baru = uniqid().".".$file->getClientOriginalExtension();
            $file->move($tujuan_upload,$nama_file_baru);
            $data['foto']   = $nama_file_baru;
        }
        // isi dengan nama folder tempat kemana file diupload
        $user   = new User();
        $create = $user->create($data);
        if($create){
            return back()->with(['success'=>'data anda tersimpan']);
        }else{
            return back()->with(['error'=>'data gagal tersimpan']);
        }
    }
    public function show($username){
        $data = [
            'title'     => "Detail User",
            'class'     => 'User',
            'sub_class' => 'Show',
            'user'      => User::firstWhere('username', $username),
        ];
        return view('admin.user.detail', $data);
    }
    public function edit($username){

    $data = [
        'title'     => "Edit User",
        'class'     => 'User',
        'sub_class' => 'Edit',
        'user'      => User::firstWhere('username', $username),
    ];
    return view('admin.user.edit', $data);
    }
    public function profileedit(){
        $username= Auth::user()->username;
        $data = [
            'title'     => "Profile Karyawan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'user',
            'user'      => User::firstWhere('username', $username),
        ];
        return view('landing.user.edit', $data);
    }
    public function profileupdate(UpdateUserRequest $request, $username){
        $input  = $request->validated();
        $data   = User::where('username', $username)->first();
        $file   = $request->file('file');
        //jika ada gambar yang diupload
        if($file !='') {
            $request->validate(
                [
                    'file' => 'mimes:jpg,bmp,png|max:512'
                ]
            );
            $tujuan_upload  = 'assets/upload/images/user/';
            if (file_exists($tujuan_upload.$data->foto)){
                unlink($tujuan_upload.$data->foto);

            }


            $nama_file_baru = uniqid().".".$file->getClientOriginalExtension();
            $input['foto']  = $nama_file_baru;
            $file->move($tujuan_upload,$nama_file_baru);
            $update         = $data->update($input);
//                unlink($file_lama);
//                unlink($file_resize);
        }else{
            $update = $data->update($input);
        }
        if($update){
            return back()->with(['success' => 'data anda tersimpan']);
        }
        return  back()->with(['error' => 'data gagal tersimpan']);
    }

    public function update(UpdateUserRequest $request, $username){
        $input  = $request->validated();
        $data   = User::where('username', $username)->first();
        $file   = $request->file('file');
        if( !empty($request->gelar_depan)){
            $input['gelar_depan']   = $request->gelar_depan;
        }

        //jika ada gambar yang diupload
        if($file !='') {
            $request->validate(
                [
                    'file' => 'mimes:jpg,bmp,png|max:512'
                ]
            );
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload  = 'assets/upload/images/user/';
            if (file_exists($tujuan_upload.$data->foto)){
                unlink($tujuan_upload.$data->foto);
            }
            $nama_file_baru = uniqid().rand(1000,9999).".".$file->getClientOriginalExtension();
            $input['foto']  = $nama_file_baru;

            $file->move($tujuan_upload,$nama_file_baru);
            $update         = $data->update($input);

        }else{

            $input['nama_lengkap']  = $request->gelar_depan.". ".$request->nama_depan." ".$request->nama_belakang.", ".$request->gelar_belakang;
            $update = $data->update($input);
        }
        if($update){
            return back()->with(['success' => 'data anda tersimpan']);
        }
        return back()->with(['error' => 'data gagal tersimpan']);
    }
    public function delete($id){
        $user       = User::find($id);
        $file_path  = "assets/upload/images/user/";
        $file       = $file_path.$user->foto;
        unlink($file);
        User::destroy($id);
        return redirect('/admin/user')->with('success', 'User has been deleted');

    }
}
