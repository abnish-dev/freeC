<?php

namespace App\Http\Controllers;
use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::latest()->paginate(5);
        return view('admin/answer/list',compact('answers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/answer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request -> validate([
            'name' => 'required',
            'description' => 'required',
             //'correct' => 'required',
        ]);

        $answer = new answer;
        $answer->name = $request->name;
        $answer->description = $request->description;
        $answer->correct_answer=$request->correct_answer;

        $answer->save();
         return redirect()->route('answer.index')->with('success','answer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = answer::find($id);
        return view('admin/answer/show',compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = answer::find($id);
        return view('admin/answer/edit',compact('answer'));
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
        $request -> validate([
            'name' => 'required',
            'description' => 'required',
             //'correct_answer' => 'required',
        ]);

        $answer = answer::find($id);
        $answer->name=$request->get('name');
        $answer->description=$request->get('description');
       
        $answer->correct_answer=$request->get('correct_answer');

        $answer->save();
         return redirect()->route('answer.index')->with('success','answer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = answer::find($id);
        $answer->delete();
        return redirect()->route('answer.index')-> with('success','answer deleted successfully');
    }
}
