<?php

namespace App\Http\Controllers;

use App\ImagesProject;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
class ProjectController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Project::all();
        $this->date['list'] = $list;
        $crops=[
            [route('projects'),"Проекты"],

        ];
        $this->date['crops']=$crops;
        return view('projectstemplates.listproject', $this->date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item($url)
    {
        $item=Project::where('url',$url)->first();
        if($item){
            $this->date['images']=ImagesProject::where('project_id',$item->id)->get();
            $this->date['item']=$item;
            $crops=[
                [route('projects'),"Проекты"],
                [route('projects_item',['url'=>$url]),$item->name],

            ];
            $this->date['crops']=$crops;
            return view('projectstemplates.cart',$this->date);
        }
    }
}