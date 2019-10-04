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


// Главная страница
Route::get('/', function () {
    return view('index');
})->name('home');


Route::middleware(['auth'])->group(function () {
    // работа с профилем
    Route::get('profil','HomeController@profil');
    Route::post('profil','HomeController@profilstore');

    // работа с группой
    Route::resource('group', 'GroupController')->only([
        'create','store','edit','update','update','destroy'
    ]);

    // работа с товаром
    Route::resource('tovar', 'TovarController')->only([
        'create','store','edit','update','destroy'
    ]);

});


//Пути к контроллерам
Route::resource('tovar', 'TovarController')->only([
    'index',
    'show'
]);
//Пути к контроллерам
Route::resource('group', 'GroupController')->only([
    'index',
    'show'
]);



// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);