<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Education\StoreEducationUserRequest;
use App\Http\Requests\User\Education\UpdateEducation_userRequest;
use App\Models\Education_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

//use http\Env\Request;

class EducationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //riwayat pendidikan user

        $pendidikan = Education_user::where('user_id', Auth::id());
        $data = [
            'title'     => "Profile Karyawan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'pendidikan'=> $pendidikan,
        ];
        return view('landing.user.pendidikan', $data);
    }
    public function create()
    {
        $education_user = new Education_user();
        $pendidikan     = DB::table('education_levels')
            ->join('education_types', 'education_levels.education_type_id', '=', 'education_types.id')
            ->where('education_types.sifat', '!=', '2')
            ->select('education_levels.*')->get();
        $data = [
            'title'             => "Tambah Pendidikan",
            'class'             => 'User',
            'sub_class'         => 'profile',
            'navbar'            => 'profile',
            'pendidikan'        => $pendidikan,
            'user'              => Auth::user(),
            'education_user'    => $education_user

        ];
        return view('landing.user.education.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEducation_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationUserRequest $request)
    {
        $input = $request->validated();

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        //deklarasi object education user
        $data = new Education_user();
        $data->user_id              = Auth::user()->id;
        $data->program_studi        = $request->program_studi;
        $data->education_level_id   = $request->level_pendidikan;
        $data->institusi            = $request->institusi;
        $data->tahun_lulus          = $request->tahun_lulus;
        $data->nomor_ijazah         = $request->nomor_ijazah;
        $data->ttd_ijazah           = $request->ttd_ijazah;
        $data->pendidikan_terahir   = $request->pendidikan_terahir;
        $data->slug                 = md5(uniqid());
        if($file !=''){
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload          = 'assets/upload/files/ijazah/';
            // upload file
            $nama_file_baru         = uniqid().$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file_baru);
            $data->file_ijazah      = $nama_file_baru;

        }else{

        }
        //aksi simpan ke database
        $tambah_data = $data->save();
        if($tambah_data){
            return redirect()->route('education.user.create')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('education.user.create')->with(['error'=>'Data gagal disimpan']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education_user  $education_user
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $education_user = Education_user::where('slug', $slug)->first();
        $pendidikan     = DB::table('education_levels')
            ->join('education_types', 'education_levels.education_type_id', '=', 'education_types.id')
            ->where('education_types.sifat', '!=', '2')
            ->select('education_levels.*')->get();
        $data = [
            'title'     => "Tambah Pendidikan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'education' => $education_user,
            'pendidikan'=> $pendidikan,
            'user'      => Auth::user()

        ];
        return view('landing.user.education.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education_user  $education_user
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $education_user = Education_user::where('slug', $slug)->first();
        $pendidikan     = DB::table('education_levels')
            ->join('education_types', 'education_levels.education_type_id', '=', 'education_types.id')
            ->where('education_types.sifat', '!=', '2')
            ->select('education_levels.*')->get();
        $data = [
            'title'     => "Tambah Pendidikan",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'education_user' => $education_user,
            'pendidikan'=> $pendidikan,
            'user'      => Auth::user()

        ];
        return view('landing.user.education.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\Education\UpdateEducation_userRequest  $request
     * @param  \App\Models\Education_user  $education_user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducation_userRequest $request, $id)
    {
        $new_slug       = md5(uniqid());
        $input          = $request->validated();
        $input['slug']  = $new_slug;
        $education_user = Education_user::find($id);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        if($file !=''){
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload          = 'assets/upload/files/ijazah/';
            // delete file lama
            $file_lama = $tujuan_upload.$education_user->file_ijazah;
//            if(file_exists($file_lama)==true){
//                unlink($file_lama);
//            }
            // upload file
            $nama_file_baru         = $new_slug.$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file_baru);
            $input['file_ijazah']   = $nama_file_baru;
        }
        $update = $education_user->update($input);
//        dd($update);
        if($update){
            return redirect()->route('education.user.show', ['slug'=>$new_slug])->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->back()->with(['error'=>'Data gagal disimpan']);
        }
    }

    public function destroy(Request $request, $id)
    {
        //delete data
        $data = Education_user::find($id);
        $delete_data = $data->delete();
        $lokasi_file = 'assets/upload/files/ijazah/'.$data->file_ijazah;
        if($delete_data){
            if(file_exists($lokasi_file)){
                unlink($lokasi_file);
            }
            return redirect()->route('profile')->with(['success'=>'Data berhasil dihapus']);

        }
    }
}
