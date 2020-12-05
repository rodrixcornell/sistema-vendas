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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('home');
});

Auth::routes([
    'register' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'middleware' => 'auth'
], function () {
    Route::resources([
        'users' => 'UserController',
        'fabricantes' => 'FabricanteController',
        'produtos' => 'ProdutoController',
        'clientes' => 'ClienteController',
    ]);
    Route::get('fabricantes-select', 'FabricanteController@fabricantesSelect')->name('fabricantes.select');
});