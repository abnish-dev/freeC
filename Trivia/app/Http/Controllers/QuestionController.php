<?php

namespace App\Http\Controllers;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin/question/listing',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin/question/create');
    }


    // public function searchQuest(Request $request)
    // {
    //   $search = $request->get('search');
    //   $questions = DB::table('questions')->where('question_name','like','%'.$search.'%')->paginate(5);
    //   return view('admin/question/listing', compact('questions'));
    // }

    // public function searchQuest(Request $request)
    // {
      
    //   $questions = Question::all();
    //   return view('admin/question/listing')->with($questions);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       // echo "<pre>";print_r($request->all());die();
        $request -> validate([
            'question_name' => 'required',
            'question_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' =>'required',
            'image' => 'required|image|max:2048',
            //'answer_option' => 'required',
        ]);
        if($request->status){
          $status = 1;
        }else{
          $status = 0;
        }
         
            $question = new Question;
            $question->question_name = $request->question_name;
            $question->question_description = $request->question_description;
            $question->start_date = $request->start_date;
            $question->end_date = $request->end_date;
            $question->status = $status;

            if ($request->hasfile('image'))
            {
              
                  $file = $request->file('image');
                  $extension = $file->getClientOriginalExtension();      // getting image extension
                  $filename = time() . '.' . $file->getClientOriginalExtension();
                  $file->move('uploads/questionaire/', $filename);
                  $question->image = $filename; 
            }
            else
            {
                 $question->image = '';
            }
          $question->save();

          //$options = $request->input('options');
         
          if (!empty($request['options']) ) {
              $options_detail = $request['options'];
               foreach ($options_detail as $option) {
                // var_dump($option['radio']);die();
                    $correct_answer = (!empty($option['radio']) && $option['radio'] === "on")?  1 : 0;
                    Answer::create(
                       [
                       'question_id'=> $question->id,
                       'answers'=> $option['answer'],
                       'correct_answer'=> $correct_answer
                      ]);
               }
           }
          

         return redirect()->route('question.index')->with('success','Question added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        //$answerData = Answer::where('question_id',$id)->get();
        //return view('admin/question/show',compact('question','answerData'));
        return view('admin/question/edit',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $i=1;
        $question = Question::find($id);
        $c = Answer::where('question_id',$id)->get()->count();
        $options_detail = Answer::where('question_id',$id)->get();
        return view('admin/question/edit',compact('question','options_detail','i','c'));

        //return view('admin/question/edit',compact('question'));
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
      
        //echo "<pre>";print_r($request->all());die();
        $request->validate([
          'question_name' => 'required',
          'question_description' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'status' =>'required',
          //'image' => 'required|image|max:2048',
        ]);
        //echo "<pre>";print_r($request->all());die();
        if($request->status){
          $status = 1;
        }else{
          $status = 0;
        }

          $question = Question::find($id);
          $question->question_name=$request->get('question_name');
          $question->question_description=$request->get('question_description');
          $question->start_date=$request->get('start_date');
          $question->end_date=$request->get('end_date');
          $question->status=$status;

            if($request->hasfile('image'))
            {
                    //echo "<pre>"; var_dump($question);die();
                    //$delete = Question::where('id', $id)->delete();
                    $file = $request->file('image');               
                    $extension = $file->getClientOriginalExtension();     
                    $filename = time().time().'.'.$file->getClientOriginalExtension();
                    $file->move('uploads/questionaire/', $filename);
                    $question->image = $filename;
                    //$update = Question::where('id', $id)->update(['image'=>$filename]);
                    //$update = Question::where('id', $id)->update();
                    //echo "<pre>"; var_dump($request);die();
            } 
          else
            {
                  //return $request;
                 $question->image = '';
            }

        $question->save();


        $options_detail = Answer::where('question_id',$id)->get();
        
        if(!empty($options_detail))
        {
            $i = 0;
            foreach($options_detail as $option)
            {
              echo "<pre>";print_r($option);
              
              //if(!empty($option['radio']) && $option['radio'] === "1")
              if($option['radio'] === "checked")  
              $option->answers = $request->get('options')[$i]['answer'];
              
              //$option->correct_answer = $request->get('options')['correct_answer'];
              //echo "<pre>";print_r($request->all());die();
              // $option->status = $request->status;
              // $option->save();
              
               //echo "<pre>";print_r($option);die();
              $i++;
            }
            // die(); 
            echo "<pre>";print_r($request->all());die();
            
            
              $options_data = $request->new_answer;
               //echo "<pre>";print_r($options_data);die();
               foreach ($options_data as $saveOption)
               {
                  $save= Answer::create(
                       [
                       'question_id'=> $question->id,
                       'answers'=> $saveOption
                       
                      ]);
                  
                }
        }


        return redirect()->route('question.index')-> with('success','question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('question.index')-> with('success','question deleted successfully');
    }
}
