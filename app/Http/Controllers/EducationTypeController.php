<?php

namespace App\Http\Controllers;

use App\Models\Education_type;
use App\Http\Requests\StoreEducation_typeRequest;
use App\Http\Requests\UpdateEducation_typeRequest;
use App\Models\User;
use Illuminate\Http\Request;

class EducationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'title'     => "Education Type",
            'class'     => 'Education',
            'sub_class' => 'type',
            'navbar'    => 'education',
            'education_type'=> Education_type::with(['education_level'])->get(),
        ];
        return view('landing.education.type.type', $data);
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
     * @param  \App\Http\Requests\StoreEducation_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = [
            'sifat'             => 'required|numeric',
            'education_type'    => 'required|unique.education_type, education_type',
        ];
        $education_type = new Education_type();
        $education_type->sifat=$request->sifat;
        $education_type->education_type=$request->education_type;
        $education_type->slug=md5(uniqid());
        $education_type->save();
        if($education_type){
            return redirect()->route('education.type')->with(['success' => 'Data berhasil tambah']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education_type  $education_type
     * @return \Illuminate\Http\Response
     */
    public function show(Education_type $education_type)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education_type  $education_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Education_type $education_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEducation_typeRequest  $request
     * @param  \App\Models\Education_type  $education_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducation_typeRequest $request, Education_type $education_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education_type  $education_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education_type $education_type)
    {
        //
    }
}
