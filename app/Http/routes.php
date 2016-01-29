<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/* 
 * vendor/laravel/framework/src/Illuminate/Routing/Router.php
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

Route::group(['middleware' => ['web']], function () {
    
    // Naming by name method
    Route::get('index', function() {
        return view('index');
    })->name('home')->middleware(['before', 'after', 'example:1']);

    Route::group(['prefix' => 'queue'], function() {
        Route::get('/', 'QueueController@index');
        Route::get('fail', 'QueueController@fail');
        Route::get('{id}', 'QueueController@show');
        Route::post('/', 'QueueController@store');
    });

    Route::group([
        'domain' => 'm.dinolai.com',
        'prefix'=>'user/{id}',
        'namespace' => 'Mobile',
        'middleware' => ['auth', 'member'],
        'where' => ['id' => '[0-9]+'],
        'name' => 'mobile::'
    ], function() {
        // Route::any('profile/{name?}/{option?}', ['uses' => 'UserController@show', 'as' => 'profile'])->where(['name' => '[a-z]+', 'option' => '[a-z]+']); //name for SEO
        // Route::get();
        // Route::put();
        // Route::patch();
        // Route::delete();
        // Route::options();
         
        // route name "mobile::index"
        Route::match(['get', 'post'], '/', function() {})->name('index');
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
    Route::get('users/popular', 'UserController@getPopular');
    Route::resource('users', 'UserController');
    Route::resource('users', 'UserController', [
                    'only' => ['index', 'show'],
                    'except' => ['create', 'store', 'update', 'destroy'],
                    'names' => ['create' => 'user.build']
                    ]);

    Route::resource('users.comments', 'UserCommentController');
    /**
     * controller
     */
    Route::controllers([
        'users' => 'UserController',
        'queues' => 'QueueController'
    ]);
    Route::controller('users', 'UserController');
    Route::controller('users', 'UserController', [
        'getPopular' => 'user.popular',
    ]);

    /**
     * ---------------------
     * Route Model Binding
     * ---------------------
     * 
     * Laravel route model binding provides a convenient way to inject model instances into your routes.
     */
    Route::model('user/{user}', function (App\User $user) {
        return $user->email;
    });


    /**
     * Customizing The "Not Found" Behavior
     */
    Route::model('user', 'User', function()
    {
        throw new NotFoundHttpException;
    });

    /**
     * Customizing The Resolution Logic
     */
    Route::bind('user', function($value)
    {
        return User::where('name', $value)->first();
    });
});