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

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/upload/images/user/';
        // upload file
        $nama_file_baru = uniqid().$file->getClientOriginalName();
        $file->move($tujuan_upload,$nama_file_baru);

        $user = new User();
        $user->gelar_depan = $request->gelar_depan;
        $user->gelar_belakang = $request->gelar_belakang;
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->nama_lengkap = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang.", ".$request->gelar_belakang;
        $user->tgl_lahir ="1984-09-06";
        $user->jk = 1;
        $user->username = Str::slug($request->username, '-');
        $user->email = $request->email;
        $user->phone_cell = $request->phone_cell;
        $user->password = hash::make($request->password);

        $user->foto = $nama_file_baru;
        $user->save();

        if($user){

            return redirect()->route('user')->with(['success'=>'data anda tersimpan']);
        }else{
            return redirect()->route('example.data')->with(['error'=>'data gagal tersimpan']);
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
    public function profileupdate(UpdateUserRequest $request, $id){
        $data = $request->all();
        $data['nama_lengkap']   = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang.", ".$request->gelar_belakang;
        $data['username']       = uniqid();
//        dd($data);
        if($request->file('file') !=''){
            $file = $request->file('file');
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload  = 'assets/upload/images/user/';
            $resize         = 'assets/upload/images/user/resize/';
            $file_resize    = $resize.Auth::user()->foto;
            $file_lama     = $tujuan_upload.Auth::user()->foto;
//                unlink($file_lama);
//                unlink($file_resize);
            //resize image
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file);
            if (Image::make($file)->width() > 100) {
                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save(public_path($resize) . $filename);
            // upload file
            $nama_file_baru = uniqid().$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file_baru);
            $data['foto'] = $nama_file_baru;
        }
        $update_user = Auth::user()->update($data);
        if ($update_user) {
//            dd($update_user);
            return redirect()->route('profile')->with(['success' => 'Data berhasil diupdate']);
        } else {
//            dd('gagal');
                return redirect()->route('profile.edit')->with(['error' => 'data gagal tersimpan']);
        }
    }

    public function update(UpdateUserRequest $request, $username){
        $input  = $request->validated();
        $data   = User::where('username', $username)->first();
        $file   = $request->file('file');
        //jika ada gambar yang diupload
        if($file !='') {
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload  = 'assets/upload/images/user/';
            $resize         = 'assets/upload/images/user/resize/';
            $file_resize    = $resize . $data->foto;
            $file_lama      = $tujuan_upload . $data->foto;
//                unlink($file_lama);
//                unlink($file_resize);
            //resize image
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $req->validate([
                'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
            ]);
            $fileModel = new File;
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
                return back()
                    ->with('success','File has been uploaded.')
                    ->with('file', $fileName);
            }

        }else{
            $update = $data->update($input);
        }
        if($update){
            return redirect()->route('user')->with(['success' => 'data anda tersimpan']);
        }
        return redirect()->route('user')->with(['error' => 'data gagal tersimpan']);
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
