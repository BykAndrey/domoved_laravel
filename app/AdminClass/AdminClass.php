<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 10.10.17
 * Time: 10:50
 */

namespace App\AdminClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Mockery\Exception;

class AdminClass extends Model
{
    /* поля для списка формат ['id'=>'название']*/
    public $fields=[];
    public $exclude=[];

    /* сортировочне поля*/
    public $sort=[];

    /*имя формы */
    public $form="standart";

    /*валидация формы*/
    public $validField=[];

    /*возращает поля для вывода в списке*/
    public static function getFields(){
        $class=get_called_class();
        return (new $class)->fields;
    }

    /*возращает поля для сортировки*/
    public static function getSortFields(){
        $class=get_called_class();
        return (new $class)->sort;
    }

    /* возращает форму*/
    public static function getForm(){
        $class=get_called_class();

        $form=(new $class)->form;
        if($form=="standart"){
            return 'admin.pages.create';
        }else{
            return $form;
        }

    }

    /*возращает список для связанных данных ['category'=>Category::all()ы]*/
    public static function getDateForm(){
        return [];
    }


    /* возращает имя для связанного объекта.
     формат названиея функции
        public static function [название связанной таблицы( не модели )]_id($id)
    */
    //public static function item_id($id)

    /*для сохранения данных*/
    public function saveRequest($request){}

    /*Сохранение после редактирования*/
    public function saveEdit($request){}

    /*сохраняет картинку по url*/
    public static function saveImage($image,$url){
        $nameF=time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path($url),$nameF);

        return    $url.'/'.$nameF;
    }

    public static function resize($imagePath,$width=null){

        if($imagePath!='Not found') {
            //echo file_exists(public_path($imagePath));

            $name=basename($imagePath);
            if ($width == null) {
                $width = imagesx($name);
            }

            $ar=explode('.', $name);



            if(count($ar)>=2){


            $basename = $ar[0];
            $type = $ar[1];
            $ResName = $basename . '_' . $width . '.' . $type;

            if (!file_exists(public_path('static/cachImage/' . $ResName))) {
                $image = imagecreatefromjpeg($imagePath);
                $orig_width = imagesx($image);
                $orig_height = imagesy($image);
                $height = (($orig_height * $width) / $orig_width);
                exec('convert '.
                    '-resize '.$width.'x'.$height.' '.public_path($imagePath).' '.public_path('static/cachImage/' . $ResName),
                    $output,
                    $ret);

            }
            return 'static/cachImage/' . $ResName;
            }
        }
    }

}