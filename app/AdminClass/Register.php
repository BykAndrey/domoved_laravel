<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 10.10.17
 * Time: 10:47
 */
namespace App\AdminClass;
class Register
{

    public static  function getTables(){
        /* [
        [   'name'=>'offer',
                'class'=>'App\Offer',
                'adminName'=>'Предложения'
            ]
        ]*/
        $tables=[
            [   'place'=>3,
                'name'=>'infopage',
                'class'=>'App\InfoPage',
                'adminName'=>'Информационные страницы'
            ],
            [   'place'=>'1',
                'name'=>'category',
                'class'=>'App\Category',
                'adminName'=>'Категория'
            ],
            [   'place'=>'1',
                'name'=>'item',
                'class'=>'App\Item',
                'adminName'=>'Товар'
            ],
            [   'place'=>'1',
                'name'=>'offer',
                'class'=>'App\Offer',
                'adminName'=>'Предложения'
            ],
            [   'place'=>'2',
                'name'=>'unit',
                'class'=>'App\Unit',
                'adminName'=>'Единицы измерения'
            ],
            [   'place'=>'2',
                'name'=>'material',
                'class'=>'App\Material',
                'adminName'=>'Материалы изготовления'
            ],
            [
                'place'=>1,
                'name'=>'image',
                'class'=>'App\Image',
                'adminName'=>'Изображения в товаре'
            ],
            [
                'place'=>'2',
                'name'=>'slider',
                'class'=>'App\Slider',
                'adminName'=>'Слайдер'
            ],
            [
                'place'=>3,
                'name'=>'project',
                'class'=>'App\Project',
                'adminName'=>'Проекты'
            ],
            [
                'place'=>3,
                'name'=>'imagesproject',
                'class'=>'App\ImagesProject',
                'adminName'=>'Каритнки проекта'
            ],
            [
                'place'=>3,
                'name'=>'opinion',
                'class'=>'App\Opinion',
                'adminName'=>'Отзывы'
            ]
            ,
            [
                'place'=>3,
                'name'=>'question',
                'class'=>'App\Questions',
                'adminName'=>'Вопросы'
            ]
        ];
        return $tables;
    }
    public static function getTable($model){
        $tables=Register::getTables();
        foreach ($tables as $item){
            if ($item['name']==$model){
                return $item;

            }
        }
        return false;
    }
}