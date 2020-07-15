<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::resource('posts', 'PostsController');

Auth::routes();
//Route::post('/auth/token', 'Auth\LoginController@auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'api'], function () {
    Route::get('mypost', 'PostsController@myposts');
    Route::get('byDate','PostsController@getByDate');
});

Route::get('/auth',function(){

    if(!Auth::check()){
        $user = App\User::find(Auth::user()->id);
        Auth::login($user);
    }


    return Auth::user();
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
