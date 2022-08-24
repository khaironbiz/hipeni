<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'title'     => 'Data Nasabah',
            'class'     => 'customer',
            'sub_class' => 'all',
            'example'   => Customer::all(),
        ];
        return view('admin.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function dashboard (){
        $data   = [
            'title' => 'Home'
        ];
        //
        return view('admin.customer.dashboard', $data);
    }
    public function login (){
        $data   = [
            'title' => 'Login'
        ];
        //
        return view('layouts.login', $data);
    }

    public function create()
    {
        //

        $data   = [
            'title'   => 'Tambah data',
        ];
        return view('admin.customer.add', $data);

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

        $validator = Validator::make($request->all(), [
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'nik'           => 'required|size:16',
            'tl'            => 'required',
            'jk'            => 'required',
            'file'          => 'required',
            'password'      => ['required', 'confirmed', Password::min(8)],
            'status'        => 'required',
            'username'      => 'required|max:50|unique:customers,username',
            'email'         => 'required|max:150|unique:customers,email',
            'hp'            => 'required|max:15|unique:customers,hp',
        ]);
        if ($validator->fails()) {
            return redirect()->route('example.data.add')->withErrors($validator)->withInput();
        }else {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/upload/images/nasabah/';
            // upload file
            $nama_file_baru = uniqid().$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file_baru);
            $example                = new Customer();
            $example->nama_depan    = $request->get('nama_depan');
            $example->nama_belakang = $request->get('nama_belakang');
            $example->nik       = $request->get('nik');
            $example->tl        = $request->get('tl');
            $example->jk        = $request->get('jk');
            $example->status    = $request->get('status');
            $example->username  = $request->get('username');
            $example->email     = $request->get('email');
            $example->hp        = $request->get('hp');
            $example->alamat    = $request->get('alamat');
            $example->password  = hash::make($request->password);
            $example->foto      = $nama_file_baru;

            $example->save();

            if ($example) {
                return redirect()->route('customer')->with(['success' => 'data anda tersimpan']);
            } else {
                return redirect()->route('customer.add')->with(['error' => 'data gagal tersimpan']);
            }
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $data   = [
            'title'   => 'Update data',
            'example' => Example::firstWhere('username', $username),
        ];
        return view('admin.customer.show-data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($username)
    {

        $data   = [
            'title'   => 'Update data',
            'example' => Example::firstWhere('username', $username),
        ];
        return view('admin.customer.edit-data', $data);
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
        $validator = Validator::make($request->all(), [
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'nik'           => 'required|size:16',
            'tl'            => 'required',
            'jk'            => 'required',
            'status'        => 'required',
            'username'      => 'required|max:50',
            'email'         => 'required|max:150',
            'hp'            => 'required|max:15',
        ]);
        if ($validator->fails()) {
            return redirect()->route('customer.add')
                ->withErrors($validator)
                ->withInput();
        }else {
            $file                   = $request->file('file');
            $example                = Example::find($id);
            $example->nama_depan    = $request->get('nama_depan');
            $example->nama_belakang = $request->get('nama_belakang');
            $example->nik           = $request->get('nik');
            $example->tl            = $request->get('tl');
            $example->jk            = $request->get('jk');
            $example->status        = $request->get('status');
            $example->username      = $request->get('username');
            $example->email         = $request->get('email');
            $example->hp            = $request->get('hp');
            $example->alamat        = $request->get('alamat');
            if($file != ''){
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload      = 'assets/upload/images/nasabah/';
                $file_lama          = $tujuan_upload.$example->foto;
                unlink($file_lama);


                // upload file
                $nama_file_baru = uniqid().$file->getClientOriginalName();
                $file->move($tujuan_upload,$nama_file_baru);
                $example->foto = $nama_file_baru;
                $example->save();
            }else{
                $example->save();
            }


            if ($example) {
                return redirect()->route('customer.data')->with(['success' => 'Data sukses disimpan']);
            } else {
                return redirect()->route('customer.data')->with(['error' => 'data gagal tersimpan']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $example        = Example::destroy($id);
        return redirect()->route('customer')->with(['success' => 'Data sukses dihapus']);
    }
}
