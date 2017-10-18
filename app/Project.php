<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminClass\AdminClass;
class Project extends AdminClass
{
    protected $table="project";

    public $fields=['id'=>'id','name'=>'Название'];
    public $form="admin.pages.forms.project";
    public $validField=[
        'name'=>'required',
        'url'=>'required|unique:project',
        'text'=>'required',
    ];
    public function getFirstImage(){
        $a=ImagesProject::where('project_id',$this->id)->first();
        if($a){
            return $a->image;
        }
        else{
            return 'Not found';
        }

    }
    public function saveRequest($request)
    {
       $item=new Project();
        $item->name=$request->input('name');
        $item->url=$request->input('url');
        $item->text=$request->input('text');
        $item->save();
    }
    public function saveEdit($request)
    {

        $this->name=$request->input('name');
        $this->url=$request->input('url');
        $this->text=$request->input('text');
        $this->save();
    }
    public function remove($allow=false){
        if($allow==false){


            $offers=ImagesProject::where('project_id',$this->id)->get();

            $listing=[['type'=>'Проект','name'=>$this->name]];
            foreach ($offers as $offer) {
                $listing[] = ['type' => 'Картинка', 'name' => $offer->name];
            }
            return $listing;


        }else{
            $items=ImagesProject::where('project_id',$this->id)->get();
            foreach ($items as $item){
                $item->remove($allow=true);
            }

            $this->delete();
        }


    }
}
