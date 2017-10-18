<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
class Slider extends AdminClass
{
    protected $table='slider';
    public $fields=['id'=>'id','item_id'=>'Товар','active'=>'Активный'];
    public $form='admin.pages.forms.slider';
    public static function getDateForm()
    {
        return ['item'=>Item::all()];
    }
    public static function m_item_id($id){
        return Item::all()->where('id',$id)->first()->title;
    }
    public function getItem(){
        return Item::where('id',$this->item_id)->get()->first();
    }
    public function getCategory(){
        $id=Item::where('id',$this->item_id)->get()->first()->category_id;
        return Category::where('id',$id)->get()->first();
    }
    public function saveRequest($request)
    {
        $item=new Slider();

        $item->item_id=$request->input('item_id');

        $item->prop1=$request->input('prop1');
        $item->prop2=$request->input('prop2');
        $item->prop3=$request->input('prop3');
        $item->prop4=$request->input('prop4');
        $item->text=$request->input('text');
        $item->active=$request->input('active');
        $item->save();
    }

    public function saveEdit($request)
    {
        $this->item_id=$request->input('item_id');

        $this->prop1=$request->input('prop1');
        $this->prop2=$request->input('prop2');
        $this->prop3=$request->input('prop3');
        $this->prop4=$request->input('prop4');
        $this->text=$request->input('text');
        $this->active=$request->input('active');
        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){
            $item=Item::where('id',$this->id)-get()->first();
            return [['type'=>'Слайд','name'=>$item->name]];
        }
        else{

            $this->delete();
        }
    }
}
