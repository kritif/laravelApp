<?php

declare(strict_types=1);

use App\Http\Controllers\GameController;
use App\Http\Middleware\RequestLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Home\MainPage')
    ->name('home.mainPage');

//USERS
Route::group(['prefix' => 'users'], function() {
    Route::get('', 'UserController@list')
    ->name('get.users');

    Route::get('{userId}', 'UserController@show')
        ->name('get.user.show');

    //Route::get('users/{id}/profile', 'User\ProfilController@show')
    //    ->name('get.user.profile');

    Route::get('{id}/address', 'User\ShowAddress')
        ->where(['id' => '[0-9]+'])
        ->name('get.users.address');
});

//GAMES BUILDER
Route::group([
    'prefix' => 'b/games',
    'namespace' => 'Game',
    'as' => 'games.b.'
    ],
    function() {
        Route::get('dashboard', 'BuilderGameController@dashboard')
            ->name('dashboard');

        Route::get('', 'BuilderGameController@index')
            ->name('list')
            ->middleware('pageValidator');

        Route::get('{game}', 'BuilderGameController@show')
            ->name('show');
});

//GAMES ELOQUENT

Route::group([
    'prefix' => 'e/games',
    'namespace' => 'Game',
    'as' => 'games.e.',
    //'middleware' => ['logger']
    //'middleware' => [RequestLog::class]
    ],
    function() {
        // Route:: middleware(['logger'])->group(
        //     function() {
        // dwa różne sposoby dodawania middlewareów
        //     }
        // );
        Route::get('dashboard', 'EloquentGameController@dashboard')
            ->name('dashboard');
            //->middleware('logger');

        Route::get('', 'EloquentGameController@index')
            ->name('list')
            ->middleware('pageValidator');

        Route::get('{game}', 'EloquentGameController@show')
            ->name('show');
});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
