<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\AdminClass\AdminClass;
use App\AdminClass\myFunc;

class Image extends AdminClass
{
    protected $table='image';
    public $form='admin.pages.forms.image';
    public $fields=['id'=>'id','name'=>'Название','item_id'=>'Предложение'];
    public $validField=[
        'name'=>'required',
        'image'=>'required'
    ];
    public static function getDateForm()
    {
        return ['item'=>Item::all()];
    }

    public static function m_item_id($id){
        return Item::all()->where('id',$id)->first()->name;
    }
    public function saveRequest($request){
        $item=new Image();
        $item->name=$request->input('name');
        $item->item_id=$request->input('item_id');
        $item->active=$request->input('active');
        if($request->file('image')->isValid()){
            $item->image=self::saveImage($request->file('image'),'static/siteImage');
        }
        $item->save();
    }
    public function saveEdit($request)
    {
        $this->name=$request->input('name');
        $this->item_id=$request->input('item_id');
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
