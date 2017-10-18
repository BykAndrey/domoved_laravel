<?php

namespace App\Http\Controllers;
use App\Category;
use App\Image;
use App\Item;
use App\Offer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $this->date['title']='Наши услуги';
        $this->date['namePage']='Наши услуги';
        $this->date['description']='Строительство коттеджей 1';
        $this->date['category']=Category::all();
        $crops=[
            [route('service'),'Услуги']
        ];
        $this->date['crops']=$crops;
      return view('servicetemplates.listServices',$this->date);
    }


    public function category($caturl){
        $baseCat=Category::where('url',$caturl)->where('active',1)->first();
        if($baseCat==null){
            return view('errors.404',$this->date);
        }
        $this->date['items']=Item::where('category_id',$baseCat->id)->get();
        $this->date['title']=$baseCat->title;
        $this->date['namePage']=$baseCat->name;
        $this->date['description']=$baseCat->description;
        $crops=[
            [route('service'),'Услуги'],
            [route('category',['cartutl'=>$caturl]),$baseCat->name],
        ];
        $this->date['crops']=$crops;



        return view('servicetemplates.listServices',$this->date);
    }
    public function item($caturl,$item){
        $baseCat=Category::where('url',$caturl)->where('active',1)->first();
        if($baseCat==null){
            return view('errors.404',$this->date);
        }

            $item=Item::where('url',$item)->where('active',1)->get()->first();
            if($item==null){
                return view('errors.404',$this->date);
            }

                $this->date['title']=$item->title;
                $this->date['namePage']=$item->name;
                $this->date['item']=$item;
                $this->date['images']=Image::where('item_id',$item->id)->where('active',1)->get();
                $this->date['offers']=Offer::where('item_id',$item->id)->where('active',1)->get();
        $crops=[
            [route('service'),'Услуги'],
            [route('category',['cartutl'=>$caturl]),$baseCat->name],
            [route('category',['item'=>$caturl,'item'=>$item]),$item->name],
        ];
        $this->date['crops']=$crops;
                return view('servicetemplates.item',$this->date);







    }
}
