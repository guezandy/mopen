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

Route::get('/', 'AppController@update2');
Route::get('home', array('as'=>'home', 'uses'=>'AppController@update2'));

Route::get('update2', array('as'=>'update2', 'uses'=>'AppController@update2'));
Route::any('people', array('as'=>'people', 'uses'=>'AppController@people'));
//Route::get('profile', array('as'=>'profile', 'uses'=>'AppController@profile'));
Route::get('profile/{username}/{id}', array('as'=>'profile', 'uses'=>'AppController@profile'));
Route::get('post/{id}', array('as'=>'post', 'uses'=>'AppController@post'));
//Route::get('user/{username}', array('as'=>'user', 'uses'=>'AppController@user'));
//Route::post('search', array('as'=>'search', 'uses'=>'AppController@search'));

//USER
//Route::get('profile', 'AppController@profile');
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

//General POST and testing stuff
//Route::get('post', array('as' => 'post', 'uses'=> 'AppController@post'));
Route::get('upload', array('as'=>'upload', 'uses'=>'AppController@upload'));
//Route::get('upload2', array('as'=>'upload2', 'uses'=>'AppController@upload2'));
Route::get('upload3', array('as'=>'upload3', 'uses'=>'AppController@upload3'));
Route::post('uploadNewPost', array('as'=>'uploadNewPost', 'uses'=>'AppController@uploadNewPost'));
Route::post('uploadResource', array('as'=>'uploadResource', 'uses'=>'AppController@uploadResource'));
Route::any('uploadCode', array('as'=>'uploadCode', 'uses'=>'AppController@uploadCode'));
Route::any('addCodeJava', array('as'=>'addCodeJava', 'uses'=> 'AppController@addCodeJava'));
Route::any('addCodeXML', array('as'=>'addCodeXML', 'uses'=> 'AppController@addCodeXML'));
Route::post('saveNewPost', array('as'=>'saveNewPost', 'uses'=>'AppController@saveNewPost'));


//Post 
Route::any('deleteCode/{id}', array('as' => 'deleteCode', 'uses' => 'PostController@deleteCode'));
Route::any('deleteResource/{id}', array('as' => 'deleteResource', 'uses' => 'PostController@deleteResource'));
Route::any('deletePost/{id}', array('as' => 'deletePost', 'uses' => 'PostController@deletePost'));

//ANDROID NATIVE POST UPLOAD:
Route::get('upload/android_native', array('as'=>'upload/android_native', 'uses'=>'AndroidNativeController@renderUploadScreen'));
Route::post('upload/android_native/save', array('as'=>'upload/android_native/save', 'uses'=>'AndroidNativeController@save'));
Route::post('upload/android_native/save_info', array('as'=>'upload/android_native/save_info', 'uses'=>'AndroidNativeController@saveBasicInfo'));
Route::post('upload/android_native/save_image', array('as'=>'upload/android_native/save_image', 'uses'=>'AndroidNativeController@uploadResource'));
Route::any('upload/android_native/add_java_snippet', array('as'=>'upload/android_native/add_java_snippet', 'uses'=>'AndroidNativeController@addJavaSnippet'));
Route::any('upload/android_native/add_xml_snippet', array('as'=>'upload/android_native/add_xml_snippet', 'uses'=>'AndroidNativeController@addXmlSnippet'));
Route::post('upload/android_native/save_code', array('as'=>'upload/android_native/save_code', 'uses'=>'AndroidNativeController@saveCode'));

//SEARCH
//Route::get('search', array('as'=>'search', 'uses'=> 'AppController@search'));

//NOTIFICAITONS
Route::get('notifications', array('as'=>'notifications', 'uses'=>'AppController@notifications'));