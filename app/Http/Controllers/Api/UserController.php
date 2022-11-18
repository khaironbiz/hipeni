<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        $data   = [
            'email'     => '',
            'password'  => ''
        ];
        return response()->json($data,200);
    }

    public function users(Request $request)
    {
        $limit = $request->limit;
        $user = UserResource::collection(User::limit($limit)->orderBy('nama_depan')->get());
        if(!$user){
            return response()->json([
                    'message' => 'Unauthorized'],
                    401);
        }

        $data = [
            'status' => 'success',
            'user'  => $user,
//            'auth'  => $request->user()
        ];

        return response()->json($data,200);
    }
    public function store(Request $request)
    {
        if($request->validate([
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required|date',
            'email'         => 'required|email:rfc,dns|unique:users,email',
            'phone_cell'    => 'required|unique:users,phone_cell',
        ])){
            $data   =[
                'gelar_depan'   => $request->gelar_depan,
                'gelar_belakang'=> $request->gelar_belakang,
                'nama_depan'    => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir'     => $request->tgl_lahir,
                'email'         => $request->email,
                'phone_cell'    => $request->phone_cell,
                'nama_lengkap'  => $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang." ".$request->gelar_belakang,
                'username'      => md5(uniqid()),
            ];

//        dd($data);
            $user   = new User();
            $add    = $user->create($data);
            if($add){
                return response()->json([
                    'message' => 'success',
                    'user'  => $data
                ]);
            }
            return response()->json([
                'message' => 'faild'
            ]);

        }
        return response()->json([
            'message' => 'gagal validasi'
        ]);



    }

    public function login(Request $request)
    {
        if(
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]))
        {
            $user = User::where('email', $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)){
                return response()->json([
                        'message' => 'Unauthorized'
                    ], 401);
            }
            $token = $user->createToken('user')->plainTextToken;
            $inser_token = $user->update(['remember_token' => $token]);
            return response()->json([
                    'message'       => 'Success',
                    'access_token'  => $token,
                    'token_type'    => 'Bearer',
                    'device_name'   => $request->device_name,
                    'data'          => $user,
                    'remember_token'=> $inser_token
                ],200);
        }else{
            return response()->json(
                [
                    'message'       => 'gagal',
                ],
                    300
                );
        }
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        if($user){
//            $request->user()->currentAccessToken()->delete();
            $data = [
                'message' => 'success',
                'user'  => $user
            ];
            return response()->json($data,200);

        }
        return response()->json([
            'message' => 'Unauthorized'],
            203);

    }
    public function show($id)
    {
        $user = User::where('username', $id)->first();
        if(!$user){
            return response()->json([
                'message' => 'Data Notfound',
                'code'      => 404
            ],404);
        }
        $user_detail = [
            'nama'  => [
                'nama_depan'    => $user->nama_depan,
                'nama_belakang' => $user->nama_belakang,
            ],
            'gelar' => [
                'gelar_depan'    => $user->gelar_depan,
                'gelar_belakang' => $user->gelar_belakang,
            ],
            'contact'   =>[
                'email' => $user->email,
                'hp'    => $user->phone_cell
            ],
            'sex'           => $user->jenis_kelamin,
            'alamat'        => [
                'provinsi'  => '',
                'kota'      => '',
                'kecamatan' => '',
                'kelurahan' => '',
                'rt'        => '',
                'rw'        => '',
                'no_rumah'  => '',
                'jalan'     => '',
                'kode_pos'  => ''
            ],
            'foto'  => $user->foto

        ];
        $data = [
            'message'   => 'success',
            'user'      => $user_detail,
            'code'      => 200
        ];

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('username', $id)->first();
        if( !$user){
            return response()->json([
                'message'   => 'Not Found',
                'code'      => 404
            ],404);
        }
        $update = $user->update($data);
        return response()->json([
            'message'   => 'Success',
            'code'      => 200,
            'update'    => $update,
            'user'      => User::find($user->id),
            'data'      => $data
        ]);
    }
    public function destroy($id)
    {
        $user = User::where('username', $id)->first();
        if( !$user){
            return response()->json([
                'message'   => 'Not Found',
                'code'      => 404
            ],404);
        }
        return response()->json([
            'message'   => 'Success',
            'code'      => 200
        ],200);
    }
    public function mytoken(Request $request){
        $user = $request->user();
        if(!$user){
            return response()->json([
                'message' => 'Unauthorized'],
                203);
        }
        $token = $request->user()->currentAccessToken();
        $data = [
            'message' => 'success',
            'token'  => $token
        ];
        return response()->json($data,200);
    }
}
