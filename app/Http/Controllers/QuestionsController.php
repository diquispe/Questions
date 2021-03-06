<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionsController extends Controller
{

    public function _construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(5);
        return view('questions.index', compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = New Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'Tu pregunta ha sido enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        /*
        if (Gate::allows('update-question', $question)){
            return view('questions.edit', compact('question'));
        }

        abort(403, "Acceso No Permitido");
        */

        $this->authorize("update", $question);
        return view("questions.edit", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        /*
        if (Gate::allows('update-question', $question)){
            $question->update($request->only('title', 'body'));
            return redirect()->route('questions.index')->with('success', 'Tu pregunta ha sido actualizada');
        }
        abort(403, "Acceso No Permitido");
        */
        $this->authorize("update", $question);
        $question->update($request->only('title', 'body'));
        return redirect()-route('questions.index')->with('success', "Tu pregunta ha sido actualizada");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        /*
        if (Gate::allows('delete-question', $question)){
            $question->delete();
            return redirect()->route('questions.index')->with('success', 'Tu pregunta ha sido eliminada');
        }
        */
        $this->authorize("delete", $question);
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Tu pregunta ha sido eliminada');

    }
}
