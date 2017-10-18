<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
use App\AdminClass\myFunc;
class InfoPage extends AdminClass
{
    protected $table="infopage";
    public $fields=['id'=>'id','title'=>'Название'];
    public $form="admin.pages.forms.infopage";
    public $validField=[
        'title'=>'required|max:90',
        'name'=>'required|max:90',
        'metaDesc' =>'required|max:90',
        'text'=>'required',
        'url'=>'required|max:120|unique:infopage,url'
    ];

    public function saveRequest($request)
    {
       $item=new InfoPage();
        $item->title=$request->input('title');
        $item->name=$request->input('name');
        $item->url=$request->input('url');
        $item->metaDesc=$request->input('metaDesc');
        $item->text=$request->input('text');
        $item->save();
    }
    public function saveEdit($request)
    {
        $this->title=$request->input('title');
        $this->name=$request->input('name');
        $this->url=$request->input('url');
        $this->metaDesc=$request->input('metaDesc');
        $this->text=$request->input('text');
        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){
            return [['type'=>'Информационная страница','name'=>$this->name]];
        }
        else{

            $this->delete();
        }

    }
}
