<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
