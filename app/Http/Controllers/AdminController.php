<?php

namespace App\Http\Controllers;

use App\ImagesProject;
use Illuminate\Http\Request;
use App\Category;
use App\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AdminClass\Register;
use App\AdminClass\myFunc;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $date=[];
    public function __construct()
    {
        $tables=Register::getTables();
        $this->date['tables']=$tables;

    }

    public function index(Request $request)
    {
        return view('admin.pages.home',$this->date);
    }
    public function listmodel($model,Request $request)
    {
            $table=Register::getTable($model);
            if($table!=false){

                $class=$table['class'];
                $this->date['model']=$model;
                $this->date['namemodel']=$table['adminName'];
                $sortby=$request->get('sortby');
                if($sortby==''){
                    $sortby='id';
                }
                $this->date['list']=$class::orderBy($sortby,'desc')->get();
                $this->date['fields']=$class::getFields();
                $this->date['sortfield']=$class::getSortFields();

                return view('admin.pages.list',$this->date);
            }
    }


    public function create($model,Request $request)
    {

        $table=Register::getTable($model);
        if($table!=false){

            $class=$table['class'];

            if($request->isMethod('get')){
                $form=$class::getForm();
                $this->date['modelDate']=$class::getDateForm();
                $this->date['date']=(new $class);
                return view( $form,$this->date);
            }
            if($request->isMethod('post')){

               $this->validate($request,(new $class())->validField);
                $obj=(new $class())->saveRequest($request);

                if($obj){
                    $obj->save();
                    return redirect()->route('editmodel',['model'=>$model,'id'=>$obj->id]);
                }
                return redirect()->route('listmodel',['model'=>$model]);

            }
        }

    }
    public function edit($model,$id,Request $request){
        $table=Register::getTable($model);
        if($table!=false){
            $class=$table['class'];
            if($request->isMethod('get')){
                $form=$class::getForm();
                $this->date['modelDate']=$class::getDateForm();
                $item=$class::where('id',$id)->get()->first();

                $this->date['date']=$item;
                return view( $form,$this->date);
            }
            if($request->isMethod('post')){

                $item=$class::where('id',$id)->get()->first();
                $item->validField['image']='';

                if(array_key_exists('url',$item->validField))
                    $item->validField['url']='required|max:120|unique:'.$model.',url,'.$item->id;

                $this->validate($request,$item->validField);
                $item->saveEdit($request);
                return redirect()->route('listmodel',['model'=>$model]);
            }

        }
    }
    public function delete($model,$id,Request $request){
        $table=Register::getTable($model);
        if($table!=false) {
           /* $class = $table['class'];
            $class::where('id',$id)->delete();
            return redirect()->route('listmodel',['model'=>$model]);*/
           $allow=$request->has('allow');
           /*Пердупреждаем что будет удалено и где*/
           if($allow==false){
               $class = $table['class'];
               $cat=$class::where('id',$id)->get()->first();
               $mes=$cat->remove();
               if($mes===false){
                 //  return '<a href="'.route('deletemodel',['model'=>$model,'id'=>$cat->id,'allow'=>'true']).'"> delet</a>';
                   //echo $mes;


               }
               else{
                   $this->date['id']=$id;
                   $this->date['model']=$model;
                   $this->date['listing']=$mes;

                   return view('admin.pages.deleteM',$this->date);
               }
           }
           else{
               /*удалям*/
               $class = $table['class'];
               $cat=$class::where('id',$id)->get()->first();

               $cat->remove(true);
                return redirect(route('admin'));
           }

        }
    }




    public function getListImage(){
        $c='App\Image';
        $listing=Category::all();
        return json_encode($listing);
    }
    public function getListImageItem(Request $request){

        $id=$request->input('id');
        $listing=Image::where('item_id',$id)->get();
        return  json_encode($listing);
    }
    public function uploadImageItem(Request $request){
        $item=new Image();
        $item->name=$request->input('name');
        $item->item_id=$request->input('item_id');
        $item->active=$request->input('active');
        if($request->file('image')->isValid()){
            $item->image=$item->saveImage($request->file('image'),'static/siteImage');
        }
        $item->save();
        return $request->file('image');
    }



    public function getListImageProject(Request $request){

        $id=$request->input('id');
        $listing=ImagesProject::where('project_id',$id)->get();
        return  json_encode($listing);
    }
    public function uploadImageProject(Request $request){
        $item=new ImagesProject();
        $item->name=$request->input('name');
        $item->project_id=$request->input('project_id');
        $item->active=$request->input('active');
        if($request->file('image')->isValid()){
            $item->image=$item->saveImage($request->file('image'),'static/siteImage');
        }
        $item->save();
        return $request->file('image');
    }
}





/*if($request->isMethod('post')){
            $cat=new Category();
            $cat->title=$request->input('title');
            $cat->metaDesc=$request->input('metaDesc');
            $cat->description=$request->input('description');
            $cat->active=$request->input('title');
            $cat->url=$request->input('url');

            if($request->file('image')->isValid()){

                $image=$request->file('image');
                $nameF='asdasd.'.$image->getClientOriginalExtension();

                $image->move(public_path('static/siteImage'),$nameF);
                $cat->image='static/siteImage/'.$nameF;
            }

            $cat->save();
            return '<img src="'.$cat->image.'"">';
        }
        else{
            return view('admin.create');
        }
*/