<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





/*Service Routing*/
Route::get('/service','ServiceController@index')->name('service');
Route::get('/service/{caturl}','ServiceController@category')->name('category');
Route::get('/service/{caturl}/{item}','ServiceController@item')->name('item');

/*projects*/
Route::get('/projects','ProjectController@index')->name('projects');
Route::get('/projects/{url}','ProjectController@item')->name('projects_item');

/* opinions */
Route::get('/opinions','OpinionController@index')->name('opinions');
Route::match(['get','post'],'/opinions/your_opinion','OpinionController@create')->name('your_opinion');


/*questions*/
Route::get('/questions','QuestionController@index')->name('questions');
Route::match(['get','post'],'/questions/create','QuestionController@addQuestion')
    ->name('questionadd');

/*admin*/

Route::get('/admin','AdminController@index')
    ->name('admin')
    ->middleware('admin');

Route::get('/admin/{model}','AdminController@listmodel')
    ->name('listmodel')
    ->middleware('admin');

Route::match(['get','post'],'/admin/{model}/create','AdminController@create')
    ->name('createmodel')
    ->middleware('admin');

Route::match(['get','post'],'/admin/{model}/edit/{id}','AdminController@edit')
    ->name('editmodel')
    ->middleware('admin');
Route::match(['get','post'],'/admin/{model}/delete/{id}','AdminController@delete')
    ->name('deletemodel')
    ->middleware('admin');




/*admin ajax response*/

Route::get('admin/ajax/getlistimage','AdminController@getListImage');/*test response*/

Route::get('admin/ajax/getlistimageitem','AdminController@getListImageItem');
Route::post('admin/ajax/uploadimage','AdminController@uploadImageItem');

Route::get('admin/ajax/getlistimagesproject','AdminController@getListImageProject');
Route::post('admin/ajax/uploadimagesproject','AdminController@uploadImageProject');




Route::match(['get','post'],'login','LoginController@index')->name('login');
Route::get('logout','LoginController@logout')->name('logout');
Route::post('changepass','LoginController@changepass')->name('changepass');

Route::get('regist','LoginController@create');




/*Base Routing*/
/*В низу потому что в верху будет перекрывать Проекты вопросы и услуги*/
Route::get('/','HomeController@index')->name('home');
Route::get('{name}','HomeController@getPage')->name('aboutsite');