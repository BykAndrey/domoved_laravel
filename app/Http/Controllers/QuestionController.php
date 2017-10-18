<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
class QuestionController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->date['questions']=Questions::where('active',1)->get();
        $crops=[
            [route('questions'),"Ответы на вопросы"],


        ];
        $this->date['crops']=$crops;
        return view('questionstemplates.listquestions',$this->date);
    }

    public function addQuestion(Request $request){
        if($request->isMethod('get')){
            $crops=[
                [route('questions'),"Ответы на вопросы"],
                [route('questionadd'),"Задать вопрос"],

            ];
            $this->date['crops']=$crops;
            return view('questionstemplates.pageform',$this->date);
        }
        if($request->isMethod('post')){
            $valid=Validator::make($request->all(),
                [
                    'name'=>'required|min:3',
                    'phone'=>'required',
                    'email'=>'required|min:5',
                    'question'=>'required|min:15',
                ],
                [
                    'name.min'=>'Длинна имя должна быть больше :min.',
                    'email.min'=>'Длинна email должна быть больше :min.',
                    'question.min'=>'Длинна отзыва должна быть больше :min.',

                ]);
            if($valid->fails()){
                return redirect(route('questionadd'))
                    ->withErrors($valid)
                    ->withInput();

            }
            $item=new Questions();
            $item->name=$request->input('name');
            $item->phone=$request->input('phone');
            $item->email=$request->input('email');
            $item->question=$request->input('question');
            $item->answer='';
            $item->active=0;
            $item->save();
            return redirect('/');
        }
    }

}
