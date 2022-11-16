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

    public function users()
    {
        $user = UserResource::collection(User::limit(5)->get());
        if(!$user){
            return response()
                ->json([
                    'message' => 'Unauthorized'],
                    401);
        }

        $data = [
            'status' => 'success',
            'user'  => $user
        ];

        return response()->json($data,200);
    }

    public function login(Request $request)
    {
        if(
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required',
            ]))
        {
            $user = User::where('email', $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)){
                return response()->json([
                        'message' => 'Unauthorized'
                    ], 401);
            }
            $token = $user->createToken($request->device_name)->plainTextToken;
            return response()->json([
                    'message'       => 'Success',
                    'access_token'  => $token,
                    'token_type'    => 'Bearer',
                    'device_name'   => $request->device_name,
                    'data'          => $user
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
        if(!$user){
            return response()->json([
                    'message' => 'Unauthorized'],
                    203);
        }
        $request->user()->currentAccessToken()->delete();
        $data = [
            'message' => 'success',
            'user'  => $user
        ];
        return response()->json($data,200);
    }
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        if($data){
            $data['nama_lengkap']   = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang." ".$request->gelar_belakang;
            $data['gelar_depan']    = $request->gelar_depan;
            $data['gelar_belakang'] = $request->gelar_belakang;
            $data['username']       = md5(uniqid());
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
            ]

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
            'foto'  => 'required|file'
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
}
