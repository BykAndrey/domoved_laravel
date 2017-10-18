<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
use App\Category;
use Illuminate\Support\Facades\Input;

class Item extends AdminClass
{
    protected $table="item";
    public $fields=['id'=>'id','title'=>"Название",'category_id'=>'Категория','active'=>"Активный"];
    public $sort=['id','title'];
    public $form='admin.pages.forms.item';
    public $validField=[
        'title'=>'required|max:90',
        'category_id'=>'required',
        'name'=>'required|max:90',
        'metaDesc' =>'required|max:90',
        'description'=>'required',
        'image'=>'required',
        'url'=>'required|max:120|unique:item,url'
    ];

    public function mostcheep(){
        $min=9999999;

            $offer=Offer::where('item_id',$this->id)->where('active',1)->orderBy('price','asc')->get()->first();
            if($offer){
                $min=$offer->price;
            }

        if ($min==9999999){
            return 0;
        }

        return $min;
    }


    public function category(){
        return Category::where('id',$this->category_id)->get()->first()->url;
    }
    public static function m_category_id($id){
        return Category::all()->where('id',$id)->first()->title;
}
    public static function getDateForm(){

        return ['category'=>Category::all()];
    }
    public function listImage(){
        return Image::where('item_id',$this->id)->get();
    }
    public function saveRequest($request){
        $item=new Item();

        $item->category_id=$request->input('category_id');
        $item->title=$request->input('title');
        $item->name=$request->input('name');
        $item->metaDesc=$request->input('metaDesc');
        $item->description=$request->input('description');
        $item->url=$request->input('url');

        $item->active=$request->input('active');
        $item->isOnMain=$request->input('isOnMain');

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

        $this->category_id=$request->input('category_id');
        $this->title=$request->input('title');
        $this->name=$request->input('name');
        $this->metaDesc=$request->input('metaDesc');
        $this->description=$request->input('description');
        $this->url=$request->input('url');

        $this->active=$request->input('active');
        $this->isOnMain=$request->input('isOnMain');

        if($request->file('image')!=''){
           $this->image= self::saveImage($request->file('image'),'static/siteImage');
        }
        $this->save();
    }

    public function remove($allow=false){
        if($allow==false){


            $offers=Offer::where('item_id',$this->id)->get();
            $images=Image::where('item_id',$this->id)->get();
            $slides=Slider::where('item_id',$this->id)->get();
            $listing=[['type'=>'Товар','name'=>$this->name]];
                foreach ($offers as $offer){
                    $listing[]=['type'=>'Предложение','name'=>$offer->name];
                }
                foreach ($images as $image){
                    $listing[]=['type'=>'Картинка','name'=>$image->name];
                }
                foreach ($slides as $slide){
                $listing[]=['type'=>'Слайд','name'=>$this->name];
                    }
                return $listing;


        }else{
            $items=Offer::where('item_id',$this->id)->get();
            foreach ($items as $item){
                $item->remove($allow=true);
            }
            $items=Image::where('item_id',$this->id)->get();
            foreach ($items as $item){
                $item->remove($allow=true);
            }
            $items=Slider::where('item_id',$this->id)->get();
            foreach ($items as $item){
                $item->remove($allow=true);
            }

            $this->delete();
        }


    }
}
