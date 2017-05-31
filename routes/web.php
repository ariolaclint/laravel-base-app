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



Route::group(['prefix' => 'auth' ], function () {
	Route::get("login"		, "Auth\LoginController@showLoginForm")->name('login');
	Route::post("login"		, "Auth\LoginController@login")->name('login');
	Route::post("logout"	, "Auth\LoginController@logout")->name('logout');

});

Route::group(['middleware' => ['superadmin'] , 'prefix' => 'auth' ], function () {
	Route::get("users"		,	"UserController@getAllUsers"	);
	Route::get("register"	, 	"UserController@index"		);
	Route::post("register"	,	"UserController@doRegister"	);
});

Route::group(['middleware' => ['auth'] , 'prefix' => 'auth' ], function () {
	Route::get("profile"			,	"ProfileController@profile"				);
	Route::get("profile/edit"		,	"ProfileController@profileEdit"			);
	Route::post("profile/update"	,	"ProfileController@profileUpdate"		);
	Route::get('home'				, 	'HomeController@index'					);
});
