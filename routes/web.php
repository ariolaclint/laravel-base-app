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
	Route::get("users"						,	"UserController@getAllUsers"	);
	Route::get("users/{id}/edit"			,	"UserController@getUserEdit"	);
	Route::get("users/{id}/view"			,	"UserController@getUserView"	);
	Route::post("users/{id}/changepassword"	,	"UserController@changePassword"	);
	Route::get("users/{id}/delete"			,	"UserController@deleteUser"		);
	Route::post("users/{id}"				,	"UserController@getUserUpdate"	);
	Route::get("register"					, 	"UserController@index"			);
	Route::post("register"					,	"UserController@doRegister"		);
});

Route::group(['middleware' => ['auth'] , 'prefix' => 'auth' ], function () {
	Route::get("profile"				,	"ProfileController@profile"				);
	Route::get("profile/picture/{path}"	,	"ProfileController@getProfilePic"		);
	Route::post("profile/picture/update",	"ProfileController@updateProfilePic"	);
	Route::get("profile/edit"			,	"ProfileController@profileEdit"			);
	Route::post("profile/update"		,	"ProfileController@profileUpdate"		);
	Route::post('profile/changepass'	, 	'ProfileController@changePassword'		);
	Route::get('home'					, 	'HomeController@index'					);
});
