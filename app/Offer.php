<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
use App\AdminClass\myFunc;
use App\Unit;
use App\Material;
class Offer extends AdminClass
{
    protected $table='offer';
    public $fields=['id'=>'id','name'=>'Название','item_id'=>'Товар','active'=>'Активный'];
    public $form='admin.pages.forms.offer';
    public static function getDateForm()
    {
        return ['item'=>Item::all(),'unit'=>Unit::all(),'material'=>Material::all()];
    }

    public function getMaterial(){
        return Material::where('id',$this->material_id)->get()->first();
    }
    public function getUnit(){
        return Unit::where('id',$this->unit_id)->get()->first();
    }
    public static function m_item_id($id){
        return Item::all()->where('id',$id)->first()->title;
    }
    public function saveRequest($request)
    {
       $item=new Offer();
        $item->name=$request->input('name');
        $item->item_id=$request->input('item_id');
        $item->unit_id=$request->input('unit_id');
        $item->material_id=$request->input('material_id');
        $item->price=$request->input('price');
        $item->description=$request->input('description');
        $item->active=$request->input('active');
        $item->save();
    }
    public function saveEdit($request)
    {
        $this->name=$request->input('name');
        $this->item_id=$request->input('item_id');
        $this->unit_id=$request->input('unit_id');
        $this->material_id=$request->input('material_id');
        $this->price=$request->input('price');
        $this->description=$request->input('description');
        $this->active=$request->input('active');
        $this->save();
    }

    public function remove($allow=false){
        if($allow==false){
            return [['type'=>'Предложение','name'=>$this->name]];
        }
        else{

            $this->delete();
        }
    }
}
