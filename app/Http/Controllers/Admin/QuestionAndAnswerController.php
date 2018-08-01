<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\PassingRate;
use App\Answer;
class QuestionAndAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $passing_rate = PassingRate::find(1);
        $minutes = $passing_rate->minutes;
        $allow = $passing_rate->allow;
        if($passing_rate)
            $passing_rate = $passing_rate->percent;
        else 
            $passing_rate = '';
        return view('dashboard.admin.QandA.index', compact('questions', 'passing_rate', 'minutes', 'allow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.QandA.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $passing_rate = PassingRate::find(1);
        if($passing_rate) {
            $questions = Question::all()->count();
            if($passing_rate->allow > $questions) {
                $question = new Question;
                $question->name = $params['question'];
                $question->save();
                if($question) {
                    foreach ($params['answer'] as $key => $value) {
                        $answwer = new Answer;
                        $answwer->name = $value;
                        $answwer->question_id = $question->id;
                        $answwer->save();
                    }
                    session()->flash('message', 'Question successfully added!');
                    return redirect('/dashboard/admin/questionsAndAnswers/create');
                }
            } else {
                session()->flash('message', 'Opps! Question limit to '. $passing_rate->allow);
                return redirect('/dashboard/admin/questionsAndAnswers/create');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = $request->all();
        foreach ($params as $key => $val) {
            $answer = Answer::where('id', $val)->first();
            if($answer) {
                $answer->is_correct = 1;
                $answer->save();
            }
            if(isset($params['answer']) && count($params['answer']) > 0) {
                foreach($params['answer'] as $key => $data) {
                    $init = Answer::find($key);
                    $init->name = $data;
                    $init->save();
                }
            }
        }

        $passing_rate = PassingRate::find(1);
        if($passing_rate) {
            $passing_rate->percent = $params['passing_rate'];
            $passing_rate->minutes = $params['minutes'];
            $passing_rate->allow = $params['allow'];
            $passing_rate->save();
        } else {
            $passing_rate = new PassingRate;
            $passing_rate->percent = $params['passing_rate'];
            $passing_rate->minutes = $params['minutes'];
            $passing_rate->allow = $params['allow'];
            $passing_rate->save();
        }

        session()->flash('message', 'Questionaire updated...');

        return redirect('/dashboard/admin/questionsAndAnswers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
