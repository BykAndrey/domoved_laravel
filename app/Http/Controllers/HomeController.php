<?php

namespace App\Http\Controllers;
use App\Category;
use App\InfoPage;
use App\Opinion;
use App\Project;
use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class HomeController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::where('active',1)->get();
        if(count($slider)>0){
            $this->date['slides']=Slider::where('active',1)->get();
        }
        $projects=Project::all()->take(4);
        $this->date['projects']=$projects;

        $opinions=Opinion::where('active',1)->get()->take(4);
        $this->date['opinions']=$opinions;


        return view('home',$this->date);
    }

    public function getPage($name){
        try{
            $page=InfoPage::where('url',$name)->get()->first();
            if($page==null){
                return view('errors.404',$this->date);
            }
            $this->date['page']=$page;

            $crops=[
                [route('aboutsite',['name'=>$name]),$page->name]
            ];
            $this->date['crops']=$crops;

            return view('hometemplates.infopage',$this->date);

        }
        catch (Exception $ex){
            return view('errors.404',$this->date);
        }

    }
}
