<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
class Questions extends AdminClass
{
    protected $table="question";
    public $form='admin.pages.forms.question';

    public $fields=['id'=>'id','name'=>'Имя','created_at'=>'Создано','active'=>'Активный'];



    public function saveRequest($request)
    {
        $item=new Questions();

        $item->name=$request->input('name');
        $item->question=$request->input('question');
        $item->answer=$request->input('answer');
        $item->phone=$request->input('phone');
        $item->email=$request->input('email');
        $item->active=$request->input('active');


        return $item;
    }
    public function saveEdit($request)
    {

        $this->name=$request->input('name');
        $this->question=$request->input('question');
        $this->answer=$request->input('answer');
        $this->phone=$request->input('phone');
        $this->email=$request->input('email');
        $this->active=$request->input('active');

        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){
            $listing=[['type'=>'Вопрос','name'=>$this->name]];

            return $listing;
        }else{
            $this->delete();
        }
    }
}
