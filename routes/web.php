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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('welcome');
});

Route::get('mail/send', 'MailController@send');

Auth::routes();

// ?Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'shipping', 'middleware' => 'auth'],function(){

	Route::get('/dashboard', [

		'uses' => 'HomeController@index',
		'as' => 'dashboard'
	]
	);


	Route::get('/notifications/list', [

		'uses' => 'NotificationsController@list',
		'as' => 'notifications.list'
	]
	);


	Route::get('/inventory/list', [

		'uses' => 'InventoryController@list',
		'as' => 'inventory.list'
	]
	);


	Route::get('/maropost/list', [

		'uses' => 'MaropostController@list',
		'as' => 'maropost.list'
	]
	);


	Route::post('/maropost/mpost', [

		'uses' => 'MaropostController@mpost',
		'as' => 'maropost.mpost'
	]
	);

//	Route::post('/maropost/post', 'MaropostController@post')->mpost('here');


	Route::get('/sku/list', [

		'uses' => 'SkuController@list',
		'as' => 'sku.list'
	]
	);


	Route::get('/sku/mount', [

		'uses' => 'SkuController@mount',
		'as' => 'sku.mount'
	]
	);


	Route::post('/sku/update', [

		'uses' => 'SkuController@update',
		'as' => 'sku.update'
	]
	);

	Route::post('/sku/delete', [

		'uses' => 'SkuController@delete',
		'as' => 'sku.delete'
	]
	);	


	// Route::post('/post/store', [

	// 	'uses' => 'PostsController@store',
	// 	'as' => 'post.store'
	// ]
	// );

	// Route::get('/category/create', [

	// 	'uses' => 'CategoriesController@create',
	// 	'as' => 'category.create'
	// ]
	// );

	// Route::post('/category/store', [

	// 	'uses' => 'CategoriesController@store',
	// 	'as' => 'category.store'
	// ]
	// );
});


