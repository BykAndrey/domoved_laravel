<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OpinionController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $this->date['opinions']=Opinion::where('active',1)->get();
        $crops=[
            [route('opinions'),"Отзывы"]
        ];
        $this->date['crops']=$crops;
        return view('opiniontemplates.list',$this->date);
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $crops=[
                [route('opinions'),"Отзывы"],
                [route('your_opinion'),"Добавить отзыв"]
            ];
            $this->date['crops']=$crops;
            return view('opiniontemplates.form',$this->date);
        }
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(), [
                'name'=>'required|max:255|min:3',
                'email'=>'required',
                'opinion'=>'required|max:255|min:10'
            ],
                [
                    'name.required'=>'Пожалуйста, введите имя коректно!',
                    'email.required'=>'Пожалуйста, введите Email коректно!',
                    'opinion.required'=>'Напишите Ваш отзыв!',
                    'opinion.min' => 'Длинна отзыва должна быть больше :min.',
                    'opinion.max' => 'Длинна отзыва должна быть меньше :max.',


                ]);
           if($validator->fails()){
               return redirect(route('your_opinion'))
                   ->withErrors($validator)
                   ->withInput();

           }
           $item =new Opinion();
            $item->name=$request->input('name');
            $item->email=$request->input('email');

            $item->opinion=$request->input('opinion');
            $item->active=0;
            if($request->file('image')){
                $image=$request->file('image');
                $nameF=time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('static/siteImage'),$nameF);
                $item->image='static/siteImage/'.$nameF;
            }
            $item->save();

        }

    }
}
