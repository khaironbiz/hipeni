<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Resources\ConsultationResource;
use App\Models\Consultant;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(){
        $consultation       = Consultation::all();
        $data_consultation  = ConsultationResource::collection($consultation);
        $data   = [
            'status'        => 'success',
            'status_code'   => 200,
            'consultation'  => $data_consultation ,
        ];
        if(empty($consultation) ){
            return response()->json([
                'status'    => 'Data not Found',
                'status'    => 404
            ],404);
        }
        return response()->json($data,200);
    }
    public function store(Request $request, $id_konsultan){
        $consultation_active = Consultation::where([
            'consultant_id' => $id_konsultan,
            'active'        => 1
        ])->count();
        $user           = $request->user();
        $consultant     = Consultant::find($id_konsultan);
        $consultation   = new Consultation();
        $data_konsultasi= [
            'user_id'       => $user['id'],
            'consultant_id' => $id_konsultan,
            'price'         => $consultant->price,
            'active'        => 1,
            'slug'          => md5(uniqid()),
        ];
        if($consultation_active <2){
            $add        = $consultation->create($data_konsultasi);
            if($add){
                $data   = [
                    'status'        => 'success',
                    'user'          => $user,
                    'status_code'   => 200,
                ];
                return response()->json($data,200);
            }
        }
        return response()->json([
            'status'                => 'Konsultasi lama masih terbuka',
            'consultation_active'   => $consultation_active,
            'user'                  => $user
            ],200);
    }
}
