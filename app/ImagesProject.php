<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
use App\AdminClass\myFunc;

class ImagesProject extends AdminClass
{
    protected $table='imagesproject';

    public $form='admin.pages.forms.imagesproject';
    public $fields=['id'=>'id','name'=>'Название','project_id'=>'Проект'];
    public $validField=[
        'name'=>'required',
        'image'=>'required'
    ];

    public static function getDateForm()
    {
        return ['project'=>Project::all()];
    }

    public static function m_project_id($id){
        return Project::all()->where('id',$id)->first()->name;
    }
    public function saveRequest($request){
        $item=new ImagesProject();
        $item->name=$request->input('name');
        $item->project_id=$request->input('project_id');
        $item->active=$request->input('active');
        if($request->file('image')->isValid()){
            $item->image=self::saveImage($request->file('image'),'static/siteImage');
        }
        $item->save();
    }
    public function saveEdit($request)
    {
        $this->name=$request->input('name');
        $this->project_id=$request->input('project_id');
        $this->active=$request->input('active');
        if($request->file('image')!=''){
            $this->image=self::saveImage($request->file('image'),'static/siteImage');
        }
        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){
            return [['type'=>'Картинка','name'=>$this->name]];
        }
        else{

            $this->delete();
        }
    }
}
