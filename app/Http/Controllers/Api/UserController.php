<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{


    public function index(Request $request)
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
        $data_validasi = [
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'nik'           => 'numeric|unique:users,nik|digits_between:16,16',
            'jenis_kelamin' => 'required|numeric',
            'tgl_lahir'     => 'required|date|date_format:Y-m-d',
            'email'         => 'required|email:rfc,dns|unique:users,email',
            'phone_cell'    => 'required|unique:users,phone_cell',
            'foto'          => 'mimes:jpg,bmp,png|max:1000'
        ];
        $validator = Validator::make($request->all(),$data_validasi);
        if ($validator->fails()){
            return response()->json([
                "error"     => $validator->errors(),
                "created"   => time(),
                "user"      => $request->all(),
                'foto'      => [
                    'extention' => $request->file('foto')->getClientOriginalExtension(),
                    'size' => $request->file('foto')->getSize(),
                    'name' => $request->file('foto')->getClientOriginalName(),
                ]
            ],203);
        }
        $data_input                 = $request->all();
        $data_input['nama_lengkap'] = $request->gelar_depan." ".$request->nama_depan." ".$request->nama_belakang." ".$request->gelar_belakang;
        $data_input['username']     = md5(uniqid());
        $user   = new User();
        $add    = $user->create($data_input);
        if($add){
            return response()->json([
                'message' => 'success',
                'user'  => $data_input
            ]);
        }
        return response()->json([
            'message' => 'faild'
        ]);
    }

    public function login(Request $request)
    {
        $data_validasi = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(),$data_validasi);
        if ($validator->fails()){
            return response()->json([
                'status'        => 'Unauthorized',
                'status_code'   => 401,
                "error"         => $validator->errors(),
                'data'          => $request->all()
            ], 401);
        }
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'status'        => 'Unauthorized',
                'status_code'   => 401,
                "error"         => $validator->errors(),
                'data'          => $request->all()
            ], 401);
        }
        $token = $user->createToken('user')->plainTextToken;
        return response()->json([
            'status'        => 'Success',
            'status_code'   => 200,
            'access_token'  => $token,
            'token_type'    => 'Bearer',
            'device_name'   => $request->device_name,
            'data'          => $user
        ],200);


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

        $data = [
            'email' => 'required|email',
            'phone_cell'    => 'required'
        ];
        $validator = Validator::make($request->all(),$data);
        if ($validator->fails()){
            return response()->json([
                "error"     => $validator->errors(),
                "created"   => time(),
                "chat"      => $request->all()
            ],203);
        }
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
            'user'      => User::find($user->id)
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
    public function upload_foto(Request $request, $id){
        $user = User::find($id);
        $file = $request->file('file');
        if( !empty($file)){
            $tujuan_upload  = 'assets/upload/images/user/';
            if(file_exists($tujuan_upload.$user['foto'])){
            unlink($tujuan_upload.$user['foto']);
            }
//
            // upload file
            $nama_file_baru = uniqid().".".$file->getClientOriginalExtension();
            $file->move($tujuan_upload,$nama_file_baru);
            $data['foto']   = $nama_file_baru;

            $update = $user->update([
                'foto'  => $data['foto'],
            ]);
        }
        return response()->json([
            'message'   => 'Success',
            'user'      => $user,
            'code'      => 200
        ],200);

    }
}
