<?php

namespace App\Http\Controllers;

use App\Models\Education_level;
use App\Models\Education_type;
use App\Models\Training;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{

    public function index()
    {
        $sifat_pendidikan           = 2;
        $education_type             = Education_type::where('sifat', $sifat_pendidikan)->first();
        $education_level            = Education_level::where('education_type_id', $education_type->id)->get();
        $product                    = Training::all();
        $data = [
            'title'             => "Training Management",
            'class'             => 'trainings',
            'sub_class'         => 'List',
            'product'           => $product,
            'education_level'   => $education_level
        ];
        return view('admin.training.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(StoreTrainingRequest $request)
    {
        $data                       = $request->validated();
        $data['slug']               = uniqid();
        $data['created_by']         = Auth::id();
        $training                   = new Training();
        $new_data                   = $training->create($data);
        if($new_data){
            return back()->with('success', 'Data berhasil disimpan') ;
        }
        return back()->with('error', 'Data gagal disimpan') ;
    }

    public function show(Training $training)
    {
        //
    }

    public function edit($slug)
    {
        //
        $sifat_pendidikan   = 2;
        $education_type     = Education_type::where('sifat', $sifat_pendidikan)->first();
        $education_level    = Education_level::where('education_type_id', $education_type->id)->get();
        $training           = Training::where('slug', $slug)->first();
        $data = [
            'title'             => "Update Data",
            'class'             => 'trainings',
            'sub_class'         => 'trainings',
            'training'          => $training,
            'education_level'   => $education_level
        ];
        return view('admin.training.edit', $data);
    }

    public function update(UpdateTrainingRequest $request, $slug)
    {
        //
        $data       = $request->validated();
        $training   = Training::where('slug', $slug)->first();
        $update     = $training->update($data);
        if($update){
           return redirect()->route('admin.training')->with('success', 'Data berhasil diupdate') ;
        }
        return back()->with('error', 'Data gagal diupdate') ;
    }

    public function destroy($slug)
    {
        $training       = Training::where('slug', $slug)->first();
        User::destroy($training->id);
        return redirect()->route('admin.training')->with('success', 'Data has been deleted');
    }
}
