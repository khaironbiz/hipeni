<?php

namespace App\Http\Controllers;
use App\Models\Education_type;
use App\Models\Education_level;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEducation_levelRequest;
use App\Http\Requests\UpdateEducation_levelRequest;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $education_level = Education_level::with(['education_type'])
                            ->orderBy('education_type_id', 'ASC')
                            ->orderBy('grade', 'ASC')
                            ->get();
        $data = [
            'title'     => "Education Level",
            'class'     => 'Education',
            'sub_class' => 'level',
            'navbar'    => 'education',
            'education_type'=> Education_type::all(),
            'education_level'=> $education_level,
        ];
        return view('landing.education.level.index', $data);
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
     * @param  \App\Http\Requests\StoreEducation_levelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = [
            'education_type_id'  => 'required|numeric',
            'education_level'    => 'required|unique.education_level, education_level',
        ];
        $education_level = new Education_level();
        $education_level->education_type_id=$request->education_type_id;
        $education_level->grade=$request->grade;
        $education_level->education_level=$request->education_level;
        $education_level->slug=md5(uniqid());
        $education_level->save();
        if($education_level){
            return redirect()->route('education.level')->with(['success' => 'Data berhasil tambah']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education_level  $education_level
     * @return \Illuminate\Http\Response
     */
    public function show(Education_level $education_level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education_level  $education_level
     * @return \Illuminate\Http\Response
     */
    public function edit(Education_level $education_level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEducation_levelRequest  $request
     * @param  \App\Models\Education_level  $education_level
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducation_levelRequest $request, Education_level $education_level)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education_level  $education_level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education_level $education_level)
    {
        //
    }
}
