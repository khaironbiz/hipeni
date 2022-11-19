<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsultantRequest;
use App\Http\Resources\ConsultantResource;
use App\Models\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function index()
    {
        $data = [
            'status'        => 'success',
            'status_code'   => 200,
            'consultants'   => ConsultantResource::collection(Consultant::all()),
        ];
        return response()->json($data,200);
    }
    public function store(StoreConsultantRequest $request)
    {
        $consultant         = new Consultant();
        $data_consultant    = $request->validated();
        $data_consultant['slug']=md5(uniqid()).random_int(1000,9999);
        $data_consultant['is_active']=1;
        $consultant_check   = Consultant::where([
            "user_id"   => $data_consultant['user_id'],
            "role"      => $data_consultant['role']
        ]);

        if($consultant_check->count() <1){
            $add    = $consultant->create($data_consultant);
            if($add){
                $data = [
                    'status'        => 'success',
                    'status_code'   => 200,
                    'consultants'   => $data_consultant,
                ];
                return response()->json($data,200);
            }
            return response()->json([
                "message"   => "Gagal disimpan"
            ],200);
        }
        return response()->json([
            "message"   => "Anda sudah terdaftar dengan role yang sama",
            "data"      => $consultant_check->first(),
            "count"     => $consultant_check->count()
        ],200);
    }
    public function show($id)
    {
        $consultant = Consultant::where('slug', $id)->first();
        $data_show  = [
            "id"    => $consultant->slug,
            "name"  => $consultant->user->nama_lengkap,
            "contact" => [
                "hp"    => $consultant->user->phone_cell,
                "email" => $consultant->user->email,
            ],
            "role"  => [
                "role_name" => $consultant->consultant_role->consultant_role,
                "price"     => $consultant->price
            ],
            "is_nakes"  => $consultant->is_nakes,
            "is_active" => $consultant->is_active

        ];
        return response()->json([
            "status"        => "Sukses",
            "status_code"   => 200,
            "consultant"    => $data_show
        ],200);
    }
    public function update(Request $request, $id)
    {
        $data_show = [
          "nama"    => $request->nama,
        ];
        return response()->json([
            "status"    => "update",
            "id"        => $id,
            "data"      => $data_show,
        ],200);
    }
}
