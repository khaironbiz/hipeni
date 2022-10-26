<?php

namespace App\Http\Controllers;

use App\Models\Answer_type;
use App\Http\Requests\StoreAnswer_typeRequest;
use App\Http\Requests\UpdateAnswer_typeRequest;
use Illuminate\Support\Facades\Auth;

class AnswerTypeController extends Controller
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
            'title'     => 'Tipe Jawaban',
            'class'     => 'Answer',
            'sub_class' => 'Index',
            'answer_type'   => Answer_type::all()->sortBy('tipe_jawaban'),
        ];
        return view('admin.answer_type.index', $data);
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
     * @param  \App\Http\Requests\StoreAnswer_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswer_typeRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $data['slug']       = md5(uniqid().rand('1000','9999'));
        $answer_type        = new Answer_type();
        $add                = $answer_type->create($data);
        if($add){
           return back()->with('success', 'Data Saved');
        }
        dd('gagal input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer_type  $answer_type
     * @return \Illuminate\Http\Response
     */
    public function show(Answer_type $answer_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer_type  $answer_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer_type $answer_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswer_typeRequest  $request
     * @param  \App\Models\Answer_type  $answer_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswer_typeRequest $request, Answer_type $answer_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer_type  $answer_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer_type $answer_type)
    {
        //
    }
}
