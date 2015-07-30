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

/* vendor/laravel/framework/src/Illuminate/Routing/Router.php
 * all route is default CSRF Protection, modify in app/Http/Kernel.php
 */

/*
 * Parameters
 * Note: Route parameters cannot contain the - character. Use an underscore (_) instead.
 * Where
 * Global patterns define in app/Providers/RouteServiceProvider.php (function boot)
 * Namespace
 * Note: By default, the RouteServiceProvider includes your routes.php file within a namespace group,
 * allowing you to register controller routes without specifying the full App\Http\Controllers namespace prefix.
 */
Route::group([
    'domain' => 'm.dinolai.com',
    'prefix'=>'user/{id}',
    'namespace' => 'Mobile',
    'middleware' => ['auth', 'member'],
    'where' => ['id' => '[0-9]+']
], function() {
    Route::any('profile/{name?}/{option?}', ['uses' => 'UserController@show', 'as' => 'profile'])->where(['name' => '[a-z]+', 'option' => '[a-z]+']); //name for SEO
    Route::get();
    Route::put();
    Route::patch();
    Route::delete();
    Route::options();
    Route::match(['get', 'post'], '/');
});

Route::group([
    'domain' => 'dinolai.com',
    'prefix'=>'user/{id}',
    'namespace' => 'Desktop',
    'middleware' => 'auth',
    'where' => ['id' => '[0-9]+']
], function() {
    //...
});

/**
 * Resource
 * Note: uri should be plural form
 */
Route::resource('users', 'UserController');

/**
 * controller
 */
Route::controllers([
    'users' => 'UserController',
    'champions' => 'ChampionController'
]);
Route::controller('users', 'UserController');
Route::controller('users', 'UserController', [
    'anyLogin' => 'user.login',
]);

/**
 * Model
 */
Route::model('user', 'User', function()
{
    throw new NotFoundHttpException;
});

/**
 * Bind
 * Add a new route parameter binder.
 */
Route::bind('user', function($value)
{
    return User::where('name', $value)->first();
});