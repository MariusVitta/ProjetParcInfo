<?php

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

Route::get('/', function() {
    return 'Je suis la page d\'accueil !';
  })->name('home');


Route::get('{n}', function($n) {
    return 'Je suis la page ' . $n . ' !';
})->where('n', '[1-3]'); /* contrainte de 3 pages, que des entiers */

Route::get('contact', function() {
    return "C'est moi le contact.";
});

Route::get('test', function () {
    return response('un test', 206)->header('Content-Type', 'text/plain');
});