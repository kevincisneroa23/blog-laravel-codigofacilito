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
//RUTAS DEL FRONTED

	Route::get('/', [
		'as' => 'front.index', 
		'uses' => 'FrontController@index'
	]);

	Route::get('categories/{name}', [
		'as' => 'front.search.category',
		'uses' => 'FrontController@searchCategory'
	]);

	Route::get('tags/{name}', [
		'as' => 'front.search.tag',
		'uses' => 'FrontController@searchTag'
	]);

	Route::get('articles/{id}', [
		'as' => 'front.view.article',
		'uses' => 'FrontController@viewArticle'
	]);

	

//RUTAS DEL PANEL DE ADMINISTRACION

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	
	Route::get('/', ['as' => 'admin.index', function () {
    	return view('admin.index');
	}]);

	Route::resource('categories', 'CategoriesController');
	Route::get('category/{id}/destroy', [
		'uses' => 'CategoriesController@destroy',
		'as' => 'admin.categories.destroy'
	]);

	Route::resource('tags', 'TagsController');
	Route::get('tags/{id}/destroy', [
		'uses' => 'TagsController@destroy',
		'as' => 'admin.tags.destroy'
	]);

	Route::resource('articles', 'ArticlesController');
	Route::get('articles/{id}/destroy', [
		'uses' => 'ArticlesController@destroy',
		'as' => 'admin.articles.destroy'
	]);	

	Route::get('images', [
		'uses' => 'ImagesController@index',
		'as' =>	'admin.images.index'
	]);

	//RESTRINGIR SOLO A NIVEL ADMINISTRADOR
	Route::group(['middleware' => 'admin'], function(){

		Route::resource('users','UsersController');
		Route::get('users/{id}/destroy',[
			'uses' => 'UsersController@destroy',
			'as' => 'admin.users.destroy'
		]);

	});

});

// Authentication routes...
Route::get('admin/auth/login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'admin.auth.login'
]);

Route::post('admin/auth/login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'admin.auth.login'
]);

Route::get('admin/auth/logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'admin.auth.logout'
]);

