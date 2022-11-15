<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $user = User::all();
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if( !$user | !Hash::check($request->password, $user->password)){
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()
            ->json([
                'message'       => 'Success',
                'access_token'  => $token,
                'token_type'    => 'Bearer',
                'device_name'   => $request->device_name,
                'data'          => $user
                ],
                200
            );
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        if(!$user){
            return response()
                ->json([
                    'message' => 'Unauthorized'],
                    401);
        }
        $request->user()->currentAccessToken()->delete();
        $data = [
            'message' => 'success',
            'user'  => $user
        ];

        return response()->json($data,200);
    }


    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('username', $id)->first();
        $user_detail = [
            'nama'  => [
                'nama_depan'    => $user->nama_depan,
                'nama_belakang' => $user->nama_belakang,
            ],
            'gelar' => [
                'gelar_depan'    => $user->gelar_depan,
                'gelar_belakang'    => $user->gelar_belakang,
            ]

        ];
        $data = [
            'status' => 'status',
            'user'  => $user_detail
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
