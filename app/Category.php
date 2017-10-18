<?php

namespace App;
use Validator;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
use App\AdminClass\myFunc;


class Category extends AdminClass
{
    protected $table='category';
    public $fields=['id'=>'id','title'=>'Название','url'=>'URL','active'=>'Опубликовано','updated_at'=>"Обнавлено"];
    public $sort=['id','title','active','updated_at'];
    public $form='admin.pages.forms.category';
    public $validField=[
        'title'=>'required|max:90',
        'name'=>'required|max:90',
        'metaDesc' =>'required|max:90',
        'description'=>'required',

        'image'=>'required',
        'url'=>'required|max:120|unique:category,url'
    ];


    public function mostcheep(){
        $min=9999999;
        $items=Item::where('category_id',$this->id)->where('active',1)->get();
        foreach ($items as $item){
            $offer=Offer::where('item_id',$item->id)->where('active',1)->orderBy('price','asc')->get()->first();
            if($offer){
                if($min>$offer->price){
                    $min=$offer->price;
                }
            }


        }
        if ($min==9999999){
            return ['min'=>0,'desc'=>$this->description];
        }
        return ['min'=>$min,'desc'=>$this->description];
    }


    public function saveRequest($request){
        $item=new Category();
        $item->title=$request->input('title');
        $item->name=$request->input('name');
        $item->metaDesc=$request->input('metaDesc');
        $item->description=$request->input('description');
        $item->url=$request->input('url');
        $item->active=$request->input('active',0);

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
        $this->title=$request->input('title');
        $this->name=$request->input('name');
        $this->metaDesc=$request->input('metaDesc');
        $this->description=$request->input('description');
        $this->url=$request->input('url');
        $this->active=$request->input('active',0);

        if($request->file('image')!=''){
            $this->image=self::saveImage($request->file('image'),'static/siteImage');
        }
        $this->save();
    }


    public function remove($allow=false){
        if($allow==false){
            $listing=[['type'=>'Категория','name'=>$this->name]];
            $items=Item::where('category_id',$this->id)->get();

                foreach ($items as $item){
                    $listing[]=['type'=>'Товар','name'=>$item->name];
                    $listing=array_merge($listing,$item->remove());
                }
                return $listing;
        }else{
            $items=Item::where('category_id',$this->id)->get();
            foreach ($items as $item){
                $item->remove($allow=true);
            }
            $this->delete();
        }


    }

}
