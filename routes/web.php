<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');

});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/visitorsdashboard', 'FrontEndController@guest')->name('guest');

    Route::get('/estates/create', [
        'uses'=> 'EstateController@create',
        'as' => 'estate.create',
    ]);
    
    Route::post('/estates/store', [
        'uses'=> 'EstateController@store',
        'as' => 'estate.store',
    ]);
    
    
    Route::get('/estates/index', [
        'uses'=> 'EstateController@index',
        'as' => 'estate.index',
    ]);
    
    Route::get('/estates/edit/{id}', [
        'uses'=> 'EstateController@edit',
        'as' => 'estate.edit',
    ]);
    
    Route::post('/estates/update/{id}', [
        'uses'=> 'EstateController@update',
        'as' => 'estate.update',
    ]);
    
    Route::get('/estates/destroy/{id}', [
        'uses'=> 'EstateController@destroy',
        'as' => 'estate.destroy',
    ]);

    Route::post('/estates/show', [
        'uses'=> 'EstateController@show',
        'as' => 'estate.show',
    ]);
   
});

Route::get('/comments/create/{id}', [
    'uses'=> 'CommentsController@create',
    'as' => 'comment.create',
]);

Route::get('/comments/delete/{id}', [
    'uses'=> 'CommentsController@destroy',
    'as' => 'comment.delete',
]);


Route::post('/comments/store/{id}', [
    'uses'=> 'CommentsController@store',
    'as' => 'comment.store',
]);

Route::get('/comments/edit/{id}', [
    'uses'=> 'CommentsController@edit',
    'as' => 'comment.edit',
]);

Route::post('/comments/update/{id}', [
    'uses'=> 'CommentsController@update',
    'as' => 'comment.update',
]);

Route::get('/comments/allcomments', [
    'uses'=> 'CommentsController@allcomments',
    'as' => 'comment.allcomments',
]);


Route::get('/frontend/index', [
    'uses'=> 'FrontEndController@index',
    'as' => 'frontend.index',
]);

Route::get('/frontend/create', [
    'uses'=> 'FrontEndController@create',
    'as' => 'frontend.create',
]);


Route::get('/frontend/singlehouse/{id}', [
    'uses'=> 'FrontEndController@singlehouse',
    'as' => 'frontend.singlehouse',
]);




