<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
use App\AdminClass\myFunc;

class Unit extends AdminClass
{
    protected $table='unit';
    public $form='admin.pages.forms.unit';
    public $fields=['id'=>'id','name'=>'Название единицы измерения'];


    public function saveRequest($request){
        $item=new Unit();
        $item->name=$request->input('name');
        $item->save();
    }
    public function saveEdit($request)
    {
        $this->name=$request->input('name');
        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){
            $listing=[['type'=>'Единица измерения','name'=>$this->name]];
            $items=Offer::where('unit_id',$this->id)->get();
            foreach ($items as $item){
                $listing[]=['type'=>'Предложение','name'=>$item->name];
            }
            return $listing;
        }
        else{
            $items=Offer::where('unit_id',$this->id)->get();
            foreach ($items as $item){
                $item->remove($allow=true);
            }
            $this->delete();
        }
    }
}
