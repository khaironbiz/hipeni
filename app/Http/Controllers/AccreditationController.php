<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Http\Requests\StoreAccreditationRequest;
use App\Http\Requests\UpdateAccreditationRequest;
use Illuminate\Support\Facades\Auth;

class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAccreditationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccreditationRequest $request)
    {
        $data               = $request->validated();
        $data['created_by'] = Auth::id();
        $skp                = new Accreditation();
        $add                = $skp->create($data);
        if($add){
            return back()->with('success', 'Data berhasil disimpan');
        }else{
            dd('gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function show(Accreditation $accreditation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accreditation $accreditation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccreditationRequest  $request
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccreditationRequest $request, Accreditation $accreditation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accreditation $accreditation)
    {
        //
    }
}
