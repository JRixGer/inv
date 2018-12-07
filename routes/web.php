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
Route::get('mail/send_consolidated', 'MailController@send_consolidated');
Route::get('sku/update_product', 'SkuController@update_product');


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

	Route::get('/inventory/list_is', [

		'uses' => 'InventoryController@list_is',
		'as' => 'inventory.list_is'
	]
	);

	Route::get('/inventory/list_consolidated', [

		'uses' => 'InventoryController@list_consolidated',
		'as' => 'inventory.list_consolidated'
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

	Route::get('/sku/running', [

		'uses' => 'SkuController@running',
		'as' => 'sku.running'
	]
	);

	Route::get('/sku/list', [

		'uses' => 'SkuController@list',
		'as' => 'sku.list'
	]
	);

	Route::get('/sku/mapping', [

		'uses' => 'SkuController@mapping',
		'as' => 'sku.mapping'
	]
	);

	Route::post('/sku/effect_update', [

		'uses' => 'SkuController@update',
		'as' => 'sku.update'
	]
	);



	Route::get('/sku/mount', [

		'uses' => 'SkuController@mount',
		'as' => 'sku.mount'
	]
	);

	Route::get('/notifications/mount', [

		'uses' => 'NotificationsController@mount',
		'as' => 'notifications.mount'
	]
	);

	Route::get('/maropost/mount', [

		'uses' => 'MaropostController@mount',
		'as' => 'maropost.mount'
	]
	);

	Route::get('/inventory/mount', [

		'uses' => 'InventoryController@mount',
		'as' => 'inventory.mount'
	]
	);

	Route::get('/notifications/mount', [

		'uses' => 'NotificationsController@mount',
		'as' => 'notifications.mount'
	]
	);

	Route::post('/sku/update', [

		'uses' => 'SkuController@update',
		'as' => 'sku.update'
	]
	);

	Route::post('/sku/update_v/{id}', [

		'uses' => 'SkuController@update_v',
		'as' => 'sku.update_v'
	]
	);



	Route::post('/sku/delete', [

		'uses' => 'SkuController@delete',
		'as' => 'sku.delete'
	]
	);	

	Route::post('/sku/search', [

		'uses' => 'SkuController@search',
		'as' => 'sku.search'
	]
	);	


	Route::get('/lineitem/list', [

		'uses' => 'LineItemsController@list',
		'as' => 'lineitem.list'
	]
	);

	Route::get('/sku/temp', [

		'uses' => 'SkuController@temp',
		'as' => 'sku.temp'
	]
	);	

	Route::get('/mail/send', [

		'uses' => 'MailController@send',
		'as' => 'mail.send'
	]
	);	

	Route::get('/mail/send_consolidated', [

		'uses' => 'MailController@send_consolidated',
		'as' => 'mail.send_consolidated'
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


