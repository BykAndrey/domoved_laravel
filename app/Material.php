<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
use App\AdminClass\myFunc;

class Material extends AdminClass
{
    protected $table='material';
    public $form='admin.pages.forms.material';
    public $fields=['id'=>'id','name'=>'Название материала'];
    public $sort=['name'];

    public function saveRequest($request){
        $item=new Material();
        $item->name=$request->input('name');

        if($request->file('image')->isValid()){
           $item->image= $this::saveImage($request->file('image'),'static/siteImage');

        }
        $item->save();
    }
    public function saveEdit($request)
    {
       $this->name=$request->input('name');
        if($request->file('image')!=''){
            $this->image=self::saveImage($request->file('image'),'static/siteImage');
        }
        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){
            $listing=[['type'=>'Материал','name'=>$this->name]];
            $items=Offer::where('material_id',$this->id)->get();
            foreach ($items as $item){
                $listing[]=['type'=>'Предложение','name'=>$item->name];
            }
            return $listing;

        }
        else{
            $items=Offer::where('material_id',$this->id)->get();
            foreach ($items as $item){
                $item->remove($allow=true);
            }
            $this->delete();
        }
    }
}
