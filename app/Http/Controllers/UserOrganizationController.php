<?php

namespace App\Http\Controllers;

use App\Models\User_job;
use App\Models\User_organization;
use App\Http\Requests\StoreUser_organizationRequest;
use App\Http\Requests\UpdateUser_organizationRequest;
use Illuminate\Support\Facades\Auth;

class UserOrganizationController extends Controller
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
        $data = [
            'title'     => "Riwayat Organisasi",
            'class'     => 'User',
            'sub_class' => 'profile',
            'navbar'    => 'profile',
            'user'      => Auth::user(),
            'organisasi'=> new User_organization(),
            'submit'    => 'Save'
        ];
        return view('landing.user.organisasi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_organizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_organizationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_organization  $user_organization
     * @return \Illuminate\Http\Response
     */
    public function show(User_organization $user_organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_organization  $user_organization
     * @return \Illuminate\Http\Response
     */
    public function edit(User_organization $user_organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_organizationRequest  $request
     * @param  \App\Models\User_organization  $user_organization
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_organizationRequest $request, User_organization $user_organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_organization  $user_organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_organization $user_organization)
    {
        //
    }
}
