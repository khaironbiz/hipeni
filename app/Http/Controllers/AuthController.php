<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivationRequest;
use App\Http\Requests\ForgetRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Mail\MailActivation;
use App\Mail\MailLoginNotification;
use App\Mail\MailRegistration;
use App\Mail\MailResetPassword;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $this->log();
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
        $this->log();
        $credentials = $request->validate([
            'email'     => ['required', 'email:dns'],
            'password'  => ['required', 'min:6'],
        ]);

        if(Auth::attempt($credentials)){
            $user               = User::find(Auth::user()->id);
            $data['username']   = md5(uniqid());
            $user->update($data);
            $data_email = [
                'penerima'  => Auth::user()->nama_lengkap,
                'server'    => [
                    'ip'        => $request->ip(),
                    'browser'   => $_SERVER['HTTP_USER_AGENT'],
                    'time'      => time()
                ]
            ];

            Mail::to($request->email)->send(new MailLoginNotification($data_email));
            if(Auth::user()->id == 1){
                return redirect()->route('profile');
            }else{
                return redirect()->route('profile')->with(['success' => 'Selamat anda berhasil login']);
            }

        }else{
            return redirect()->route('login')->with('error', 'Login failed!!')->withInput();
        }

    }

    public function registration(){
        $this->log();
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
        $this->log();
        $data = $request->validated();
        $data['nama_lengkap']   = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang." ".$request->gelar_belakang;
        $data['gelar_depan']    = $request->gelar_depan;
        $data['gelar_belakang'] = $request->gelar_belakang;
        $data['username']       = md5(uniqid());
        $add_user = User::create($data);
        if($add_user){
            $lik = route('activate', ['username'=> $data['username']]);
            $data_email = [
                'penerima'  => $data['nama_lengkap'],
                'link'      => $lik
            ];
            Mail::to($request->email)->send(new MailRegistration($data_email));
            return redirect()->back()->with('success', 'Created successfully!');
        }else{
            return redirect()->back()->with('error', 'Data gagal disimpan');
        }

    }
    public function activate($username){
        $this->log();
        $user = User::where('username', $username)->first();
        $data = [
            'title'     => "Aktifasi Akun",
            'class'     => 'Auth',
            'sub_class' => 'activate',
            'navbar'    => 'login',
            'user'      => $user
        ];
        return view('landing.auth.activate', $data);
    }
    public function aktifkan(ActivationRequest $request, $username){
        $this->log();
        $user   = User::where('username', $username)->first();
        $data   = $request->validated();
        $data['password']   = Hash::make($request->password);
        $update = $user->update($data);
        if($update){
            $data_email = [
                'penerima'  => $user['nama_lengkap']
            ];
            Mail::to($user->email)->send(new MailActivation($data_email));
            return redirect()->route('login')->with(['success' => 'Akun berhasil diaktifkan']);
        }
    }

   public function forgot()
    {
        $this->log();
        $data = [
            'title'     => "Forgot Password",
            'class'     => 'Auth',
            'sub_class' => 'forgot',
            'navbar'    => 'login',
        ];
        return view('landing.auth.forgot', $data);
    }
    public function call_user(ForgetRequest $request){
        $this->log();
        $validated = $request->validated();
        $user = User::where('email', $request->email)->where('phone_cell', $request->hp)->first();
        if($user != NULL){
            $link = route('reset_akun', ['username'=>$user->username]);
            $data_email = [
                'penerima'  => $user['nama_lengkap'],
                'link'      => $link
            ];
            Mail::to($user->email)->send(new MailResetPassword($data_email));
            return redirect()->route('login')->with(['success' => 'Permohonan reset password telah dikirim ke email yang terdaftar, silahkan periksa email anda']);
        }else{
            return back()->with(['warning' => 'Acount not found']);
        }
    }
    public function reset($username){
        $this->log();
        $user = User::where('username', $username)->first();
        if($user != NULL){
            $data = [
                'title'     => "Reset Password",
                'class'     => 'Auth',
                'sub_class' => 'forgot',
                'navbar'    => 'login',
                'user'      => $user
            ];
            return view('landing.auth.reset', $data);
        }else{
            $data = [
                'title'     => "Reset Password",
                'class'     => 'Auth',
                'sub_class' => 'forgot',
                'navbar'    => 'login',
            ];
            return view('landing.all.notfound', $data);
        }

    }
    public function reset_password(UpdatePasswordRequest $request, $username){
        $this->log();
        $username_baru      = md5(uniqid());
        $data               = $request->validated();
        $data['password']   = Hash::make($request->password);
        $data['username']   = $username_baru;
        $user               = User::where('username', $username)->first();
        $update             = $user->update($data);
        return redirect()->route('reset_akun', $username_baru);
    }

    public function destroy(Request $request, $id)
    {
        $this->log();
        $example        = Example::destroy($id);
        return redirect()->route('example.data')->with(['success' => 'Data sukses dihapus']);
    }
    public function logout(Request $request)
    {
        $this->log();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('root')->with(['success' => 'Silahkan login kembali']);
    }
    public function email(){
        Mail::to("khaironbiz@gmail.com")->send(new MailRegistration());
    }
    private function log(){
        $log = new Log();
        $pengunjung = [
            'ip'        => \Request::getClientIp(true),
            'user_id'   => 0,
            'url'       => url()->full(),
            'time'      => time(),
        ];
        $log->create($pengunjung);
    }
}
