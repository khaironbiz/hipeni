<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConsultantResource;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'status'        => 'success',
            'status_code'   => 200,
            'consultants'   => ConsultantResource::collection(Consultant::all()),
        ];
        return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $consultant     = new Consultant();
        $validator      = Validator::make($request->all(), [
            'user_id'   => 'required|numeric',
            'price'     => 'required|numeric',
            'role'      => 'required|numeric',
            'is_nakes'  => 'required',
        ]);
        $data_consultant    = $request->all();
        $data_consultant['slug']=md5(uniqid()).random_int(1000,9999);
        $data_consultant['is_active']=1;
        if ($validator->fails()){
            return response()->json([
                "message"   => $validator->errors()
            ],203);
        }
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consultant $consultant)
    {
        if($consultant){
            $data = [
                'status'        => 'success',
                'status_code'   => 200,
                'consultants'   => $consultant,
            ];
            return response()->json($data,200);
        }
        $data = [
            'status'        => 'Not Found',
            'status_code'   => 404,
            'consultants'   => $consultant,
        ];
        return response()->json($data,404);

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
    public function update(Request $request, Consultant $consultant)
    {

        $data_validasi = [
            'user_id'   => 'required|numeric',
            'price'     => 'required|numeric',
            'role'      => 'required|numeric',
            'is_nakes'  => 'required'
        ];
        $validator = Validator::make($request->all(),$data_validasi);
        $data_consultant = $request->all();

        if($validator->fails()){
            return response()->json([
                'consultant'    => $consultant,
                'data_post'     => $data_consultant,
                'message'       => $validator->errors(),
                'success'       => false,
            ],203);
        }
        $update = $consultant->update($data_consultant);
        if($update){
            return response()->json([
                'consultant'    => $consultant,
                'data_post'     => $data_consultant,
                'message'       => $validator->errors(),
                'success'       => true,
            ],200);

        }
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
