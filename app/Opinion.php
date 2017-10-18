<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
class Opinion extends AdminClass
{
    protected $table='opinion';
    public $fields=['id'=>'id','name'=>'Название','active'=>'Опубликовано','updated_at'=>"Обнавлено"];
    public $sort=['id','name','active','updated_at'];
    public $form='admin.pages.forms.opinion';
    public $validField=[
        'name'=>'required|max:90',
        'opinion'=>'required',
        'image'=>'required',
    ];

    public function saveRequest($request)
    {
       $item=new Opinion();

       $item->name=$request->input('name');
        $item->opinion=$request->input('opinion');
        $item->email=$request->input('email');
        $item->active=$request->input('active');
        if($request->file('image')->isValid()){
            $image=$request->file('image');
            $nameF=time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('static/siteImage'),$nameF);
            $item->image='static/siteImage/'.$nameF;
        }

        return $item;
    }

    public function saveEdit($request)
    {
        $this->name=$request->input('name');
        $this->opinion=$request->input('opinion');
       $this->email=$request->input('email');
        $this->active=$request->input('active');
        if($request->file('image')!=''){
            $this->image=self::saveImage($request->file('image'),'static/siteImage');
        }
        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){
            $listing=[['type'=>'Отзыв','name'=>$this->name]];

            return $listing;
        }else{
            $this->delete();
        }
    }
}
