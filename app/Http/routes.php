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

Route::get('/', 'AppController@welcome');

Route::get('/home', 'AppController@home');


//USER
Route::get('profile', 'AppController@profile');
	
Route::get('register', array('as' => 'register', 'uses' => 'AppController@register'));

Route::get('login', array('as' => 'login', 'uses' => 'AppController@login'));

Route::post('verifyLogin', array('as' => 'verifyLogin', 'uses' => 'AppController@verifyLogin'));

Route::post('register_new_user', array('as'=> 'register_new_user', 'uses'=> 'AppController@registerNewUser'));

Route::get('/user/activation/{act}', array(
		'as' => '/user/activation',
		'uses' => 'AppController@userActivation'
	)
);
Route::get('logout', array('as'=>'logout', 'uses'=>'AppController@logout'));
Route::get('forgot_password',  array('as'=>'forgot_password', 'uses'=>'AppController@forgotPassword'));
Route::get('reset_password', array('as'=>'resetPassword', 'uses'=>'AppController@resetPassword'));

//POST
Route::get('post', array('as' => 'post', 'uses'=> 'AppController@post'));

Route::get('upload', array('as'=>'upload', 'uses'=>'AppController@upload'));

Route::post('uploadNewPost', array('as'=>'uploadNewPost', 'uses'=>'AppController@uploadNewPost'));

//SEARCH
Route::get('search', array('as'=>'search', 'uses'=> 'AppController@search'));

//NOTIFICAITONS
Route::get('notifications', array('as'=>'notifications', 'uses'=>'AppController@notifications'));