<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Example;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function index()
    {


        $data = [
            'title'     => "Login",
            'class'     => 'Auth',
            'sub_class' => 'login',
            'navbar'    => 'login',
        ];
//        return view('auth.login', $data);
        return view('landing.auth.login', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email:dns'],
            'password'  => ['required', 'min:6'],
        ]);
        if( ! $credentials){
            return redirect()->route('login')->with(['success' => 'Selamat anda berhasil login']);
        }

        if(Auth::attempt($credentials)){
            if(Auth::user()->id == 1){
                return redirect()->route('profile')->with(['success' => 'Selamat anda berhasil login']);
            }else{
                return redirect()->route('profile')->with(['success' => 'Selamat anda berhasil login']);
            }

        }else{
            return redirect()->route('login')->with('error', 'Login failed!! please check again')->withInput();
        }

    }

    public function registration(){

        $data = [
            'title'     => "Registrasi Anggota",
            'class'     => 'User',
            'sub_class' => 'registration',
            'navbar'    => 'login',

        ];
//        return view('auth.registration', $data);
        return view('landing.auth.registration', $data);
    }
    public function register(RegisterRequest $request){

        $data = $request->validated();
        $data['nama_lengkap']   = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang." ".$request->gelar_belakang;
        $data['gelar_depan']    = $request->gelar_depan;
        $data['gelar_belakang'] = $request->gelar_belakang;
        $data['username']       = uniqid();
        $add_user = User::create($data);
        if($add_user){
            return redirect()->back()->with('success', 'Created successfully!');
        }else{
            return redirect()->back()->with('error', 'Data gagal disimpan');
        }

    }
    public function forgot()
    {
        $data = [
            'title'     => "Forgot Password",
            'class'     => 'Auth',
            'sub_class' => 'forgot',
            'navbar'    => 'login',
        ];
        return view('landing.auth.forgot', $data);
    }
    public function call_user(ForgetRequest $request){
        $validated = $request->validated();
        if($validated){
            dd('sukses forgor');
        }else{
            dd('gagal forgot');
        }
    }


    public function destroy(Request $request, $id)
    {
        $example        = Example::destroy($id);
        return redirect()->route('example.data')->with(['success' => 'Data sukses dihapus']);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('root')->with(['success' => 'Silahkan login kembali']);
    }
}
