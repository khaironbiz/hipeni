<?php

namespace App\Http\Controllers;

use App\Models\Answer_type;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
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
            'title'     => 'Bank Soal',
            'class'     => 'Soal',
            'sub_class' => 'Index',
            'training'  => Training::all(),
        ];
        return view('admin.question.index', $data);
    }
    public function list($slug)
    {
        //
        $training   = Training::where('slug', $slug)->first();
//        dd($training);
        $data = [
            'title'         => 'Bank Soal : '.$training->nama_training,
            'class'         => 'Soal',
            'sub_class'     => 'List',
            'training'      => $training,
            'answer_type_id'=> Answer_type::all(),
            'question'      => Question::where('training_id', $training->id)->get(),
        ];
        return view('admin.question.list', $data);
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
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request, $slug)
    {
        $training           = Training::where('slug', $slug)->first();
        $data               = $request->validated();
        $data['training_id']= $training->id;
        $data['created_by'] = Auth::id();
        $data['slug']       = md5(uniqid().rand(1000,9999));
        $question           = new Question();
        $add                = $question->create($data);
        if($add){
            return back()->with('success', 'Data saved');
        }
        dd('gagal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
