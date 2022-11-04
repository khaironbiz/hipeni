<?php

namespace App\Http\Controllers;

use App\Models\Study_method;
use App\Http\Requests\StoreStudy_methodRequest;
use App\Http\Requests\UpdateStudy_methodRequest;
use Illuminate\Support\Facades\Auth;

class StudyMethodController extends Controller
{

    public function index()
    {
        $methode    = Study_method::all();
        $data       = [
            'title'         => "Metode Pembelajaran",
            'class'         => 'study_method',
            'sub_class'     => 'trainings',
            'methode'       => $methode
        ];
        return view('admin.materi.metode.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(StoreStudy_methodRequest $request)
    {
        $data           = $request->validated();
        $data['slug']   = uniqid();
        $data['created_by']= Auth::id();
        $Study_method   = new Study_method();
        $add            = $Study_method->create($data);
        if($add){
            return redirect()->route('admin.study.methode')->with('success', 'Data berhasi disimpan');
        }else{
            return back()->with('warning', 'Data gagal disimpan');
        }

    }

    public function show(Study_method $study_method)
    {
        //
    }

    public function edit($slug)
    {
        //
        $methode    = Study_method::where('slug', $slug)->first();
        $data       = [
            'title'         => "Metode Pembelajaran",
            'class'         => 'trainings',
            'sub_class'     => 'trainings',
            'methode'       => $methode
        ];
        return view('admin.materi.metode.edit', $data);
    }

    public function update(UpdateStudy_methodRequest $request, $slug)
    {
        $data           = $request->validated();
        $study_method   = Study_method::where('slug', $slug)->first();
        $update         = $study_method->update($data);
        if($update){
            return redirect()->route('admin.study.methode')->with('success', 'Data berhasi diupdate');
        }else{
            return back()->with('success', 'Data gagal diupdate');
        }
    }

    public function destroy($slug)
    {
        //
        $study_method   = Study_method::where('slug', $slug)->first();
        $delete         = Study_method::destroy($study_method->id);
        if($delete){
            return redirect()->route('admin.study.methode')->with('success', 'Data berhasi didelete');
        }else{
            return back()->with('success', 'Data gagal didelete');
        }
    }
}
