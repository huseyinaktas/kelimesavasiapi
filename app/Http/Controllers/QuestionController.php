<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $questions = Question::with(["answers", "category"])->get();
        return response()->json(['success' => true, "data" => $questions], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create([
            "content" => $request->content,
            "category_id" => $request->category_id,
        ]);

        foreach ($request->answers as $answer) {
            $ans = Answer::make(["title" => $answer["title"]]);
            $question->answers()->save($ans);
        }

        return response()->json(['success' => true, "data" => $question], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::with("answers")->findOrFail($id);
        return response()->json(['success' => true, "data" => $question], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->content = $request->content;
        $question->category_id = $request->category_id;
        $question->save();
        return response()->json(['success' => true, "data" => $question], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return response()->json(['success' => true, "message" => "Soru Silindi"], 200);
    }
}
