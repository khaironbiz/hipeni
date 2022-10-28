<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer_type;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
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

    public function list($slug)
    {

        $question   = Question::where('slug', $slug)->first();
        $answer     = Answer::where('question_id', $question->id);
        $answer_type= Answer_type::all();
        $data = [
            'title'         => 'Jawaban : '.$question->pertanyaan,
            'class'         => 'Answer',
            'sub_class'     => 'Index',
            'answer'        => $answer->inRandomOrder()->get(),
            'count'         => $answer->count(),
            'question'      => $question,
            'answer_type'   => $answer_type
    ];
        return view('admin.answer.index', $data);
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
     * @param  \App\Http\Requests\StoreAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request, $slug)
    {
        $question   = Question::where('slug', $slug)->first();
        $data       = $request->validated();
        $input_a    = [
                'question_id'   => $question->id,
                'jawaban'       => $request->a,
                'created_by'    => Auth::id(),
                'slug'          => md5(uniqid().rand(1000,9999))

        ];
        $input_b    = [
            'question_id'   => $question->id,
            'jawaban'       => $request->b,
            'created_by'    => Auth::id(),
            'slug'          => md5(uniqid().rand(1000,9999))

        ];
        $input_c    = [
            'question_id'   => $question->id,
            'jawaban'       => $request->c,
            'created_by'    => Auth::id(),
            'slug'          => md5(uniqid().rand(1000,9999))

        ];
        $input_d    = [
            'question_id'   => $question->id,
            'jawaban'       => $request->d,
            'created_by'    => Auth::id(),
            'slug'          => md5(uniqid().rand(1000,9999))

        ];
        $input_e    = [
            'question_id'   => $question->id,
            'jawaban'       => $request->e,
            'created_by'    => Auth::id(),
            'slug'          => md5(uniqid().rand(1000,9999))

        ];
        $answer = new Answer();
        $answer->create($input_a);
        $answer->create($input_b);
        $answer->create($input_c);
        $answer->create($input_d);
        $answer->create($input_e);
        return back()->with('success', 'Data saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswerRequest  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
