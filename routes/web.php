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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(
    [
        "as" => "support.",
        "prefix" => "suporte",
    ], function () {

        Route::resource('ticket', TicketController::class);

    }
);

Route::resource('sellers', SellerController::class);
