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

Route::get('profile', 'AppController@profile');
	
Route::get('register', array('as' => 'register', 'uses' => 'AppController@register'));

Route::get('login', array('as' => 'login', 'uses' => 'AppController@login'));

Route::post('register_new_user', array('as'=> 'register_new_user', 'uses'=> 'AppController@registerNewUser'));

Route::get('/user/activation/{act}', array(
		'as' => '/user/activation',
		'uses' => 'AppController@userActivation'
	)
);

Route::get('upload', array('as'=>'upload', 'uses'=>'AppController@upload'));