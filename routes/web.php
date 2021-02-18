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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{locale}/data', function ($locale) {
    if (! in_array($locale, ['en', 'en-gb', 'fr-ch'])) {
        abort(400);
    }    

    App::setLocale($locale);

    return view('api');
});

Route::get('/rawtext', function () {
    return view('api-end-point-notes');
});
